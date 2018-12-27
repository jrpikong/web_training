<template>
    <div class="card my-3">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">List Members</h5>
            <div class="header-elements">
                <ul class="pagination pagination-sm pagination-pager justify-content-between mt-2 mt-sm-0">
                    <li class="page-item">
                        <a href="#" class="page-link list-icons-item"
                           @click="fetchEventsList"><i class="icon-reset mr-3 icon-1x"></i> Load
                        </a>
                    </li>
                    <li class="page-item"><a href="#" class="page-link"><a class="list-icons-item" data-action="collapse"></a></a></li>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" @submit.prevent="fetchEventsList" class="row">

                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" v-model="search.user_name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Gender</label>
                        <div class="col-lg-10">
                            <select class="form-control" v-model="search.gender">
                                <option value="male">Male</option>
                                <option value="Fimale">Fimale</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Provinces</label>
                        <div class="col-lg-10">
                            <v-select v-model="search.selected" :onChange="getCitiesList" :options="options"></v-select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">City</label>
                        <div class="col-lg-10">
                            <v-select v-model="search.city" label="name" :onChange="getDistricList" :options="cities"></v-select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Disctric</label>
                        <div class="col-lg-10">
                            <v-select v-model="search.distric" label="name" :options="districts"></v-select>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Tahun Lahir</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" v-model="search.tahun_lahir">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">University</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" v-model="search.university">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Jurusan</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" v-model="search.jurusan">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">IPK</label>
                        <div class="col-lg-10">
                            <select v-model="search.ipk" class="form-control">
                                <option value="New Student">New Student</option>
                                <option value="< 2">< 2</option>
                                <option value="2 - 2,5">2 - 2,5</option>
                                <option value="> 2,5 - 3">> 2,5 - 3</option>
                                <option value="> 3 - 3,5">> 3 - 3,5</option>
                                <option value="> 3,5 - 4">> 3,5 - 4 </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Phone Number</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" v-model="search.phone_number">
                        </div>
                    </div>

                    <div class="text-right">
                        <download-excel
                                class="btn btn-success"
                                :data   = "items"
                                name="report_users.xls">
                            Download Data
                            <i class="icon-file-excel"></i>
                        </download-excel>

                        <button type="submit" class="btn btn-primary">Search <i class="icon-search4"></i></button>
                    </div>
                </div>

            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-xs table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-if="items.length ===0">
                    <td colspan="8" class="text-center"><p>Data Not Found</p></td>
                </tr>
                <tr v-if="!loading" v-for="(item, index) in items" :key="item.vtype">
                    <td> {{index + 1}} </td>
                    <td> {{item.name}}</td>
                    <td> {{item.email}}</td>
                    <td> {{item.gender}}</td>
                    <td> {{item.phone_number}}</td>
                    <td> {{item.address}}</td>
                    <td>
                        <a :href="'get_member/'+item.id" class="nav-link"> Detail</a>
                        <a style="cursor:pointer; color: red;" @click="delete_data(item.id)" class="nav-link"> Delete</a>
                    </td>
                </tr>
                <tr v-if="loading">
                    <td colspan="8" class="text-center"><i class="icon-spinner10 spinner text-info"></i> Loading ...</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    import Vue from 'vue'
    import JsonExcel from 'vue-json-excel'
    Vue.component('downloadExcel', JsonExcel)
    import vSelect from 'vue-select'

    Vue.component('v-select', vSelect)
    export default {
        name: "ListMember",
        data : function () {
            return {
                items:[],
                provinces: [],
                loading:true,
                search:{
                    user_name: '',
                    gender: '',
                    university: '',
                    phone_number: '',
                    selected: '',
                    city:'',
                    distric:''
                },
                options:[],
                cities: [],
                districts: []
            }
        },
        created() {
            this.fetchEventsList()
            this.fetchProvincesList()
        },
        methods: {
            des(v) {
              console.log(v)
            },
            delete_data (id) {
                if(confirm("Are you sure you want to delete this?")){
                    axios.get('delete_member/'+id).then((response)=>{
                        setTimeout(function () {
                            window.location = '/admin/members';
                        }, 100)
                    });
                }
                else{
                    return false;
                }

            },
            async fetchEventsList() {
                this.loading = true
                setTimeout(() => {
                    axios.get('get_members',{params:this.search}).then((response)=>{
                        this.items = response.data.data
                        this.loading = false
                    });
                },500)
            },
            async fetchProvincesList() {
                setTimeout(() => {
                    axios.get('get_province').then((response)=>{
                        this.options = response.data.data
                    });
                },10)
            },
            async getCitiesList(val) {
                setTimeout(() => {
                    axios.get('/api/cities?province='+val.id).then((response)=>{
                        this.cities = response.data.cities
                    });
                },1)
            },
            async getDistricList(val) {
                setTimeout(() => {
                    axios.get('/api/districts?city='+val.id).then((response)=>{
                        this.districts = response.data.districts
                    });
                },1)
            },
        }
    }
</script>