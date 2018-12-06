<template>
    <div class="card my-3">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Basic form inputs</h5>
        </div>

        <div class="card-body">
            <form enctype="multipart/form-data" @submit.prevent="sumbitForm">
                <fieldset class="mb-3">

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Product Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" v-model="product_name" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Product Category</label>
                        <div class="col-lg-10">
                            <select class="form-control" v-model="product_category">
                                <option v-for="(category,index) in categories" :key="index" :value="category.id">{{ category.category_name }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Price</label>
                        <div class="col-lg-10">
                            <input type="number" class="form-control" v-model="price" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Sort Descriptions</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" v-model="sort_descriptions" required></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Descriptions</label>
                        <div class="col-lg-10">
                            <ckeditor type="classic" style="height: 200px;" v-model="descriptions" :upload-adapter="UploadAdapter"></ckeditor>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-2">
                            <label class="col-form-label">Product Images</label>
                        </div>
                        <div class="col-md-10">

                            <div class="form-group row">
                                <div class="col-md-10">
                                    <div v-for="(file, key) in productImages" :key="key" class="pt-2">
                                        {{ file.name }}
                                        <button type="button" class="btn btn-danger" v-on:click="removeImageProduct( key )">Remove</button>
                                    </div>
                                    <input id="productImages" ref="productImages" type="file" multiple class="form-control" v-on:change="handleFilesUploadProduct()" required/>
                                </div>
                                <div class="col-md-2">
                                    <!--<button type="button" v-on:click="addImageProducts()" class="btn btn-file">Add Files</button>-->
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="form-group row">
                        <div class="col-md-2">
                            <label class="col-form-label">Product Tecnology Images</label>
                        </div>
                        <div class="col-md-10">

                            <div class="form-group row">
                                <div class="col-md-10">
                                    <div v-for="(file, key) in productTecnologyImages" :key="key" class="pt-2">
                                        {{ file.name }}
                                        <button type="button" class="btn btn-danger" v-on:click="removeImageTecnologyProduct( key )">Remove</button>
                                    </div>
                                    <input id="productTecnologyImages" ref="productTecnologyImages" type="file" multiple class="form-control" v-on:change="handleFilesUploadTecnologyProduct()" required/>
                                </div>
                                <div class="col-md-2">
                                    <!--<button type="button" v-on:click="addImageTecnologyProducts()" class="btn btn-file">Add Files</button>-->
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-md-2">
                            <label class="col-form-label">Video</label>
                        </div>
                        <div class="col-md-10">

                            <div class="form-group row">
                                <div class="col-md-10">
                                    <input id="productVideo" ref="productVideo" placeholder="input url terakhir youtube ex: mx_dolESHco" type="text" multiple class="form-control" v-model="product_video"/>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-2">
                            <label class="col-form-label">Spesifications</label>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group row" v-for="(spesification, index) in spesifications" :key="index">
                                <div class="col-md-5">
                                    <input type="text" class="form-control" v-model="spesification.key" placeholder="Color" required/>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" v-model="spesification.value" placeholder="Color Volume 100%" required/>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" v-if="index === 0" v-on:click="addNewQuestions" class="btn btn-success btn-block">
                                        Add Spesifications +
                                    </button>
                                    <button v-else type="button" v-on:click="removeQuestions(index)" class="btn btn-danger btn-block">
                                        Delete Spesification +
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>

                </fieldset>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic'
    import VueCkeditor from 'vue-ckeditor5'
    const options = {
        editors: {
            classic: ClassicEditor,
        },
        name: 'ckeditor'
    }

    Vue.use(VueCkeditor.plugin, options);

    export default {
        name: "FormProduct",
        data () {
            return {
                product_id: '',
                categories: [],
                product_name: '',
                product_category: '',
                price: '',
                sort_descriptions: '',
                descriptions: '',
                productImages: [],
                productTecnologyImages: [],
                product_video: '',
                spesifications: [
                    {
                        key: '',
                        value: ''
                    }
                ],
            }

        },
        created() {
            this.getCategories()
        },
        methods: {
            UploadAdapter: function (loader) {
                this.loader = loader
                this.upload = () => {
                    const body = new FormData();
                    body.append('file', this.loader.file);
                    return axios.post('/uploadFile',body,{
                        headers: {
                            'Content-Type': 'multipart/form-data',

                        }
                    }).then(response =>{
                        console.log(response);
                        return {default: response.data};
                            // return downloadUrl
                    })
                        .catch(error => {
                            console.log(error);
                        });
                }
                this.abort = () => {
                    console.log('Abort upload.')
                }
            },
            addNewQuestions: function () {
                this.spesifications.push(Vue.util.extend({},this.spec))
            },
            removeQuestions: function (index) {
                Vue.delete(this.spesifications, index);
            },
            getCategories: function(){
                axios.get('/admin/get_product_categories').then((response) => {
                    this.alert = true;
                    if(response.data){
                        this.categories = response.data.data;

                    }
                });
            },
            addImageProducts(){
                this.$refs.productImages.click();
            },
            removeImageProduct( key ){
                this.productImages.splice( key, 1 );
            },
            handleFilesUploadProduct(){
                let uploadedFiles = this.$refs.productImages.files;
                for( var i = 0; i < uploadedFiles.length; i++ ){
                    this.productImages.push( uploadedFiles[i] );
                }
            },
            addImageTecnologyProducts(){
                this.$refs.productTecnologyImages.click();
            },
            removeImageTecnologyProduct( key ){
                this.productTecnologyImages.splice( key, 1 );
            },
            handleFilesUploadTecnologyProduct(){
                let uploadedFiles = this.$refs.productTecnologyImages.files;
                for( var i = 0; i < uploadedFiles.length; i++ ){
                    this.productTecnologyImages.push( uploadedFiles[i] );
                }
            },

            sumbitForm(){
                /*
                  Initialize the form data
                */
                let formData = new FormData();

                /*
                  Iteate over any file sent over appending the files
                  to the form data.
                */
                for( var i = 0; i < this.productImages.length; i++ ){
                    let file = this.productImages[i];

                    formData.append('productImages[' + i + ']', file);
                }

                for( var i = 0; i < this.productTecnologyImages.length; i++ ){
                    let file = this.productTecnologyImages[i];

                    formData.append('productTecnologyImages[' + i + ']', file);
                }

                formData.append('product_name',this.product_name);
                formData.append('product_category',this.product_category);
                formData.append('price', this.price);
                formData.append('sort_descriptions', this.sort_descriptions);
                formData.append('product_video', this.product_video);
                formData.append('descriptions',this.descriptions);
                formData.append('spesifications', JSON.stringify(this.spesifications));
                /*
                  Make the request to the POST /select-files URL
                */
                axios.post( 'post_product',
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data',

                        }
                    }
                ).then(function(response){
                    if(response.data.status === '00') {
                        setTimeout(function () {
                            window.location = '/admin/list_product';
                        }, 400)
                    }
                }).catch(function(){
                    console.log('FAILURE!!');
                });
            },
        }
    }
</script>

<style>
    .ck-editor__editable {
        min-height: 400px;
    }
</style>