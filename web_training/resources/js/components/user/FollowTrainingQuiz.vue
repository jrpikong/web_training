<template>
    <div>
        <div v-if="start === false">
            <fieldset class="mb-3">
                <legend class="text-uppercase font-size-sm font-weight-bold"><h1> {{ training.title }} </h1></legend>
                <h4> {{ training.sort_description }}</h4>
                <h4> Waktu Pengerjaan {{ training.time }} Menit</h4>
            </fieldset>

            <div class="text-center pt-3">
                <h1>Jika Merasa Sudah Cukup Memahami dan Menguasai, Silahkan Klik "TEST" Dibawah Ini Untuk Mengetahui Tingkat Penguasaaan Materi</h1>
                <button v-on:click="startQuiz" class="btn btn-dark btn-block">Mulai</button>
            </div>
        </div>

        <div class="card my-3" v-show="start">
            <div class="card-header bg-white header-elements-inline">
                <h4 class="card-title"> Soal ke {{ questionIndex + 1 }} dari {{ questions.length }}</h4>
                <div class="header-elements">
                    <h4><i class="icon-alarm"></i><vue-countdown v-on:time-expire="handleTimeExpire" :seconds="Number(waktu * 60)" :start="start"></vue-countdown></h4>
                </div>
            </div>

            <div class="card-body">
                <div v-for="(question,index) in questions" :key="index">
                    <div class="form-group row" v-show="index === questionIndex">
                        <label class="d-block font-weight-semibold col-md-12">{{ index + 1 }}. {{ question.question }}</label>
                        <div class="col-md-12">
                            <ul class="soal">
                                <li v-for="(choice,key) in question.choice" :key="key">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" v-model="userResponses[index]" :value="choice.choice">
                                            A. {{ choice.choice }}
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white d-sm-flex justify-content-sm-between align-items-sm-center">
                <ul class="pagination pagination-sm pagination-pager justify-content-between mt-2 mt-sm-0">
                    <li class="page-item"><a v-if="questionIndex > 0" v-on:click="prev" class="page-link">← &nbsp; Previous</a></li>
                    <li class="page-item"><a v-on:click="next" class="page-link">Next &nbsp; →</a></li>
                </ul>

                <ul class="pagination pagination-sm pagination-pager justify-content-between mt-2 mt-sm-0">
                    <button type="button" v-show="(questionIndex + 1) === questions.length" class="btn bg-blue" v-on:click="handleResults">Kirim Jawaban</button>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    import VueCountdown from '@dmaksimovic/vue-countdown';
    let moment = require('moment');
    export default {
        name: "FollowTrainingQuiz",
        props : ['training-quiz'],
        components: { 'vue-countdown': VueCountdown },
        data() {
            return {
                training: JSON.parse(this.trainingQuiz),
                start: false,
                date:'',
                waktu:90,
                questionIndex:0,
                questions:[],
                userResponses:[],
                answers:[],
                correct:0
            }
        },
        mounted() {
            this.date = moment().format('MMM d');
        },
        methods: {
            startQuiz () {
                this.start = true;
                axios.get('/get_training_quiz/'+this.training.id).then((response)=>{
                    this.questions = response.data.data
                });

            },
            handleTimeExpire () {
                alert('Time is up!');
                this.handleResults();
            },
            startTimer () {
                this.start = true;
            },
            next: function() {
                // console.log(this.questionIndex);
                if((this.questionIndex + 1) !== this.questions.length){
                    this.questionIndex++;
                }
            },
            // Go to previous question
            prev: function() {
                this.questionIndex--;
            },
            handleResults() {
                this.questions.forEach((a, index) => {
                    let cr = false
                    if (this.userResponses[index] === a.correct_answer) {
                        cr = true;
                    }
                    this.answers[index] = [
                        {
                            'answer': this.userResponses[index],
                            'question_id': a.id,
                            'correct': cr

                        }
                    ];
                });
                this.correct = this.answers.filter(function(val) {
                    if(val[0].correct === true){
                        return val[0].correct;
                    }
                }).length;

                /*POST*/
                axios.post('/post_quiz',{'answers':this.answers,'quiz_id':this.training.id,'total_correct':this.correct}).then((response)=>{
                    this.correct = response
                });

            }
        }
    }
</script>

<style scoped>

</style>

