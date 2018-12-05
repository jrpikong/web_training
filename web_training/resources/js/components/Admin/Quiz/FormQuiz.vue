<template>
    <div>
        <div :class="'alert alert-'+alert_info+' border-0 alert-dismissible'" v-if="alert">
            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
            <span class="font-weight-semibold">Info!</span> {{ message }}
        </div>

        <div v-else class="card my-3">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Basic form inputs</h5>
        </div>

        <div class="card-body">
            <form @submit.prevent="sumbitForm">
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold">Deskripsi Kuis</legend>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Lama Waktu Pengerjaan</label>
                        <div class="col-lg-10">
                            <input type="number" class="form-control" v-model="waktu_pengerjaan" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Status Kuis</label>
                        <div class="col-lg-10">
                            <select name="status" class="form-control form-control-uniform" v-model="status_kuis" required>
                                <option value="">Status Kis</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>

                    <!--<div class="form-group row">-->
                        <!--<label class="col-form-label col-lg-2">Tipe Kuis</label>-->
                        <!--<div class="col-lg-10">-->
                            <!--<select name="type" class="form-control form-control-uniform" v-model="tipe_kuis" required>-->
                                <!--<option value="">Tipe Kuis</option>-->
                                <!--<option value="Personal Test">Personal Test</option>-->
                                <!--<option value="Training Tes">Training Tes</option>-->
                            <!--</select>-->
                        <!--</div>-->
                    <!--</div>-->

                </fieldset>

                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold">Soal Ujian</legend>
                    <div v-for="(question,index) in questions" :key="index">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-1">
                                        <h1>{{ index+1 }}</h1>
                                    </div>
                                    <div class="col-md-11">
                                        <button type="button" v-on:click="removeApartment(index)" class="btn btn-danger">
                                            Hapus Soal
                                        </button>
                                    </div>
                                </div>
                                <hr>
                            </div>

                            <div class="col-md-4">
                                <div class="row">
                                    <label class="col-form-label col-lg-6">Status Soal</label>
                                    <div class="col-lg-6">
                                        <select class="form-control form-control-uniform" v-model="question.status_soal" name="questions[][status_soal]" required>
                                            <option value="">Status Soal</option>
                                            <option value="Aktif">Aktif</option>
                                            <option value="Tidak Aktif">Tidak Aktif</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="col-md-4">-->
                                <!--<div class="row">-->
                                    <!--<label class="col-form-label col-lg-4">Kunci Jawaban</label>-->
                                    <!--<div class="col-lg-8">-->
                                        <!--<select class="form-control form-control-uniform"  v-model="question.jawaban" name="questions[][jawaban]" required>-->
                                            <!--<option value="">Isi Kunci Jawaban</option>-->
                                            <!--<option value="A">A</option>-->
                                            <!--<option value="B">B</option>-->
                                            <!--<option value="C">C</option>-->
                                            <!--<option value="D">D</option>-->
                                        <!--</select>-->
                                    <!--</div>-->
                                <!--</div>-->
                            <!--</div>-->

                        </div>
                        <!--<div class="form-group row">-->
                            <!--<label class="col-form-label col-lg-2">Pertanyaan</label>-->
                            <!--<div class="col-lg-10">-->
                                <!--<input type="text" class="form-control" v-model="question.pertanyaan" name="questions[][pertanyaan]" required>-->
                            <!--</div>-->
                        <!--</div>-->
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Pilihan A</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" v-model="question.pilihan_a" name="questions[][pilihan_a]" required>
                            </div>
                            <div class="col-md-1">
                                <select class="form-control" v-model="question.type_of_choice_a" name="questions[][type_of_choice_a]" required>
                                    <option value="Sanguinis">Sanguinis</option>
                                    <option value="Melankolis">Melankolis</option>
                                    <option value="Kolerik">Kolerik</option>
                                    <option value="Plegmati">Plegmati</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Pilihan B</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" v-model="question.pilihan_b" name="questions[][pilihan_b]" required>
                            </div>
                            <div class="col-md-1">
                                <select class="form-control" v-model="question.type_of_choice_b" name="questions[][type_of_choice_b]" required>
                                    <option value="Sanguinis">Sanguinis</option>
                                    <option value="Melankolis">Melankolis</option>
                                    <option value="Kolerik">Kolerik</option>
                                    <option value="Plegmati">Plegmati</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Pilihan C</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" v-model="question.pilihan_c" name="questions[][pilihan_c]" required>
                            </div>
                            <div class="col-md-1">
                                <select class="form-control" v-model="question.type_of_choice_c" name="questions[][type_of_choice_c]" required>
                                    <option value="Sanguinis">Sanguinis</option>
                                    <option value="Melankolis">Melankolis</option>
                                    <option value="Kolerik">Kolerik</option>
                                    <option value="Plegmati">Plegmati</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Pilihan D</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" v-model="question.pilihan_d" name="questions[][pilihan_d]" required>
                            </div>
                            <div class="col-md-1">
                                <select class="form-control" v-model="question.type_of_choice_d" name="questions[][type_of_choice_d]" required>
                                    <option value="Sanguinis">Sanguinis</option>
                                    <option value="Melankolis">Melankolis</option>
                                    <option value="Kolerik">Kolerik</option>
                                    <option value="Plegmati">Plegmati</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <div class="text-right">
                    <button type="button" v-on:click="addNewApartment" class="btn btn-success">
                        Tambah Pertanyaan +
                    </button>
                    <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
                </div>
            </form>
        </div>
    </div>
    </div>
</template>

<script>
    export default {
        name: "FormQuiz",
        data : function () {
            return {
                alert: false,
                alert_info: 'danger',
                message: '',
                waktu_pengerjaan: '',
                status_kuis: '',
                tipe_kuis: 'Personal Test',
                questions:[],
                question: {
                    status_soal: '',
                    jawaban: 'A',
                    pertanyaan: '-',
                    pilihan_a: '',
                    type_of_choice_a: 'Sanguinis',
                    pilihan_b: '',
                    type_of_choice_b: 'Melankolis',
                    pilihan_c: '',
                    type_of_choice_c: 'Kolerik',
                    pilihan_d: '',
                    type_of_choice_d: 'Plegmati'
                }

            }
        },
        methods: {
            addNewApartment: function () {
                this.questions.push(Vue.util.extend({}, this.question))
            },
            removeApartment: function (index) {
                Vue.delete(this.questions, index);
            },
            sumbitForm: function () {
                let dataForm = {
                    waktu_pengerjaan: this.waktu_pengerjaan,
                    status_kuis: this.status_kuis,
                    tipe_kuis: this.tipe_kuis,
                    questions: this.questions
                };
                axios.post('post_quiz',dataForm).then((response) => {
                    this.alert = true;
                    if(response.data){
                        this.alert_info = 'primary';
                        this.message = response.data.message;
                        if(response.data.status === '00') {
                            setTimeout(function () {
                                window.location = '/admin/list_quiz';
                            }, 400)
                        }
                    }
                });
            }
        }
    }
</script>

<style scoped>

</style>