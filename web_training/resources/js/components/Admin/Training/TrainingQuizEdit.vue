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
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" v-model="question.question"  required>
                                    <input type="hidden" class="form-control" v-model="question.id"  required>
                                </div>
                                <div class="col-lg-1">
                                    <select class="form-control" v-model="question.correct_answer" required>
                                        <option value="">Kunci Jawaban</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                    </select>
                                </div>
                            </div>
                            <div >
                                <div class="form-group row" v-for="(choice,index) in question.choice">
                                    <label class="col-form-label col-lg-2">Pilihan A</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" v-model="choice.choice" required>
                                        <input type="hidden" class="form-control" v-model="choice.id" required>
                                    </div>
                                </div>
                                <!--<div class="form-group row">-->
                                    <!--<label class="col-form-label col-lg-2">Pilihan B</label>-->
                                    <!--<div class="col-lg-10">-->
                                        <!--<input type="text" class="form-control" v-model="questions[index].choice_b" required>-->
                                    <!--</div>-->
                                <!--</div>-->
                                <!--<div class="form-group row">-->
                                    <!--<label class="col-form-label col-lg-2">Pilihan C</label>-->
                                    <!--<div class="col-lg-10">-->
                                        <!--<input type="text" class="form-control" v-model="questions[index].choice_c" required>-->
                                    <!--</div>-->
                                <!--</div>-->
                                <!--<div class="form-group row">-->
                                    <!--<label class="col-form-label col-lg-2">Pilihan D</label>-->
                                    <!--<div class="col-lg-10">-->
                                        <!--<input type="text" class="form-control" v-model="questions[index].choice_d" required>-->
                                    <!--</div>-->
                                <!--</div>-->
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
        name: "TrainingQuizEdit",
        props:['dataQuiz'],
        data () {
            return {
                alert: false,
                alert_info: '',
                idQuiz: this.dataQuiz.id,
                waktu_pengerjaan: this.dataQuiz.time,
                title: this.dataQuiz.title,
                sort_description: this.dataQuiz.sort_description,
                correct_answer:'',
                choice:[],
                questions:[
                ],
                pertinyiin : [],
                delete: [],
                cloning:{
                    correct_answer:'',
                    created_at:'',
                    id:null,
                    question:'',
                    quiz_id:null,
                    updated_at:'',
                    choice: [{
                            choice:'',
                            created_at:'',
                            id:'',
                            question_id:'',
                            updated_at:''
                        },
                        {
                            choice:'',
                            created_at:'',
                            id:'',
                            question_id:'',
                            updated_at:''
                        },
                        {
                            choice:'',
                            created_at:'',
                            id:'',
                            question_id:'',
                            updated_at:''
                        },
                        {
                            choice:'',
                            created_at:'',
                            id:'',
                            question_id:'',
                            updated_at:''
                        }]
                }
            }
        },
        created (){
            this.startQuiz();
        },
        methods: {
            startQuiz () {
                axios.get('/get_training_quiz/'+this.idQuiz).then((response)=>{
                    this.questions = response.data.data
                    this.questions.forEach((a, index) => {
                        a.choice.forEach((choiceValue,i) => {
                            let parsing = '';
                            if (choiceValue.choice === a.correct_answer) {
                                if (i === 0) {
                                    parsing = 'A';
                                }else if (i === 1){
                                    parsing = 'B'
                                } else if (i === 2){
                                    parsing = 'C'
                                }else if (i === 3){
                                    parsing = 'D'
                                }
                                a.correct_answer =parsing;
                            }
                        })

                    });
                });



            },
            removeQuestions: function (index) {
                this.delete.push(index);
                Vue.delete(this.questions, index);
            },
            addNewApartment: function () {
                console.log(Vue.util.extend({},this.questions[0]));

                this.questions.push(Vue.util.extend({},this.cloning))
            },
            sumbitForm: function () {
                this.questions.forEach((a, index) => {
                    let kunci_paten = '';
                    if (a.correct_answer === 'A') {
                        kunci_paten = a.choice[0].choice;
                    }else if (a.correct_answer === 'B') {
                        kunci_paten = a.choice[1].choice;
                    }else if (a.correct_answer === 'C') {
                        kunci_paten = a.choice[2].choice;
                    }else if (a.correct_answer === 'D') {
                        kunci_paten = a.choice[3].choice
                    }
                    this.pertinyiin[index] = {
                        'delete': this.delete,
                        'id':a.id,
                        'question': a.question,
                        'correct_answer': kunci_paten,
                        'pilihan': [
                            {
                                'id': a.choice[0].id,
                                'value': a.choice[0].choice,
                            },
                            {
                                'id': a.choice[1].id,
                                'value': a.choice[1].choice,
                            },
                            {
                                'id': a.choice[2].id,
                                'value': a.choice[2].choice,
                            },
                            {
                                'id': a.choice[3].id,
                                'value': a.choice[3].choice,
                            }
                        ]
                    };
                });

                let dataForm = {
                    training_id:this.dataQuiz.training_id,
                    idQuiz: this.idQuiz,
                    waktu_pengerjaan: this.waktu_pengerjaan,
                    title: this.title,
                    sort_description: this.sort_description,
                    questions: this.pertinyiin
                };
                axios.post('/submit_quiz_training_edit', dataForm).then((response) => {
                    // this.alert = true;
                    // if(response.data){
                    //     this.alert_info = 'primary';
                    //     this.message = response.data.message;
                    //     if(response.data.status === '00') {
                    //         setTimeout(function () {
                    //             window.location = '/trainings';
                    //         }, 400)
                    //     }
                    // }
                });
            }
        }
    }
</script>

<style scoped>

</style>