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

        <div class="table-responsive">
            <table class="table table-xs table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Phone Number</th>
                    <th>Postal Code</th>
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
                    <td> {{item.postal_code}}</td>
                    <td> {{item.address}}</td>
                    <td>
                        <a :href="'get_member/'+item.id"> Detail</a>
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
    export default {
        name: "ListMember",
        data : function () {
            return {
                items:[],
                loading:true
            }
        },
        created() {
            this.fetchEventsList()
        },
        methods: {
            async fetchEventsList() {
                this.loading = true
                setTimeout(() => {
                    axios.get('get_members').then((response)=>{
                        this.items = response.data.data
                        this.loading = false
                    });
                },500)
            }
        }
    }
</script>