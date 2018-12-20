<template>
    <div>
        <form @submit.prevent="sumbitForm" method="post">
            <fieldset class="mb-3">
                <legend class="text-uppercase font-size-sm font-weight-bold">Page</legend>

                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Name</label>
                    <div class="col-lg-10">
                        <input type="text" name="name" v-model="form.name" class="form-control" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Status</label>
                    <div class="col-lg-10">
                        <select name="status" v-model="form.status" class="form-control" required>
                            <option value="">Select Status</option>
                            <option value="1">Active</option>
                            <option value="0">In Active</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Description 1</label>
                    <div class="col-lg-10">
                        <ckeditor type="classic" name="title" v-model="form.title" class="form-control"></ckeditor>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Description 2</label>
                    <div class="col-lg-10">
                        <ckeditor type="classic" v-model="form.description" :upload-adapter="UploadAdapter"></ckeditor>
                    </div>
                </div>

            </fieldset>

            <div class="text-right">
                <button type="submit" class="btn btn-primary">Save <i class="icon-paperplane ml-2"></i></button>
            </div>
        </form>
    </div>
</template>

<script>
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic'
    import Alignment from '@ckeditor/ckeditor5-alignment/src/alignment'
    import VueCkeditor from 'vue-ckeditor5'
    const options = {
        editors: {
            classic: ClassicEditor,
        },
        name: 'ckeditor'
    }

    Vue.use(VueCkeditor.plugin, options);

    export default {
        name: "formAddPage",
        data() {
            return {
                form: {
                    name: '',
                    title: '',
                    status: '',
                    description:''
                },
            }
        },
        methods: {
            UploadAdapter: function (loader) {
                this.loader = loader
                this.upload = () => {
                    const body = new FormData();
                    body.append('file', this.loader.file);
                    return axios.post('/uploadFile', body, {
                        headers: {
                            'Content-Type': 'multipart/form-data',
                        }
                    }).then(response => {
                        console.log(response);
                        return {default: response.data};
                        // return downloadUrl
                    }).catch(error => {
                        console.log(error);
                    });
                }
                this.abort = () => {
                    console.log('Abort upload.')
                }
            },
            sumbitForm: function () {
                axios.post( '/admin/pages', this.form).then(function(response){
                    if(response.data.status === '00') {
                        setTimeout(function () {
                            window.location = '/admin/pages';
                        }, 400)
                    }
                }).catch(function(){
                    console.log('FAILURE!!');
                });
            }
        }
    }
</script>
<style>
    .ck-editor__editable {
        min-height: 400px;
    }
</style>