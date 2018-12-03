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
                            <label class="col-form-label col-lg-2">Title Quiz</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" v-model="title" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Sort Description Quiz</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" v-model="sort_description" required>
                            </div>
                        </div>
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
                                            <button type="button" v-on:click="removeQuestions(index)" class="btn btn-danger">
                                                Hapus Soal
                                            </button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Pertanyaan</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" v-model="question.pertanyaan"  required>
                                </div>
                            </div>
                            <div >
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Pilihan A</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" v-model="questions[index].choice_a" required>
                                    </div>
                                    <div class="col-lg-1">
                                        <select class="form-control" v-model="questions[index].kunci_a" required>
                                            <option value="">Kunci Jawaban</option>
                                            <option value="true">True</option>
                                            <option value="false">False</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Pilihan B</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" v-model="questions[index].choice_b" required>
                                    </div>
                                    <div class="col-lg-1">
                                        <select class="form-control" v-model="questions[index].kunci_b" required>
                                            <option value="true">True</option>
                                            <option value="false">False</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Pilihan C</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" v-model="questions[index].choice_c" required>
                                    </div>
                                    <div class="col-lg-1">
                                        <select class="form-control" v-model="questions[index].kunci_c" required>
                                            <option value="true">True</option>
                                            <option value="false">False</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Pilihan D</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" v-model="questions[index].choice_d" required>
                                    </div>
                                    <div class="col-lg-1">
                                        <select class="form-control" v-model="questions[index].kunci_d" required>
                                            <option value="true">True</option>
                                            <option value="false">False</option>
                                        </select>
                                    </div>
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
        name: "TrainingQuizForm",
        props:['id-quiz'],
        data () {
            return {
                alert: false,
                alert_info: '',
                waktu_pengerjaan: 90,
                title: 'dsa',
                sort_description: 'sad',
                choice:[],
                questions:[
                    {
                        pertanyaan:'',
                        choice_a:'',
                        choice_b:'',
                        choice_c:'',
                        choice_d:'',
                        kunci_a:true,
                        kunci_b:false,
                        kunci_c:false,
                        kunci_d:false,
                    }
                ],
                pertinyiin : []
            }
        },
        methods: {
            removeQuestions: function (index) {
                Vue.delete(this.questions, index);
            },
            addNewApartment: function () {
                console.log(Vue.util.extend({},this.questions[0]));

                this.questions.push(Vue.util.extend({},this.questions[0]))
            },
            sumbitForm: function () {
                this.questions.forEach((a, index) => {
                    this.pertinyiin[index] = {
                        'pertanyaan': a.pertanyaan,
                        'pilihan': [
                            {
                                'value': a.choice_a,
                                'kunci': a.kunci_a
                            },
                            {
                                'value': a.choice_b,
                                'kunci': a.kunci_b
                            },
                            {
                                'value': a.choice_c,
                                'kunci': a.kunci_c
                            },
                            {
                                'value': a.choice_d,
                                'kunci': a.kunci_d
                            }
                        ]
                    };
                });

                let dataForm = {
                    idQuiz: this.idQuiz,
                    waktu_pengerjaan: this.waktu_pengerjaan,
                    title: this.title,
                    sort_description: this.sort_description,
                    questions: this.pertinyiin
                };
                axios.post('/submit_quiz_training', dataForm).then((response) => {
                    this.alert = true;
                    if(response.data){
                        this.alert_info = 'primary';
                        this.message = response.data.message;
                        if(response.data.status === '00') {
                            setTimeout(function () {
                                window.location = '/trainings';
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