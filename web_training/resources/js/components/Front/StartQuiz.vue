<template>
    <div>
        <div v-if="loading" class="text-center"><i class="icon-spinner10 spinner text-info"></i> Loading ...</div>
        <div v-else class="card my-3">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Soal Ujian Test Kepribadian</h5>
            </div>

            <div class="card-body">
                <form @submit.prevent="sumbitForm">
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">Deskripsi Kuis</legend>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Lama Waktu Pengerjaan</label>
                            <div class="col-lg-10">
                                {{ items.waktu }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Sisa Waktu Pengerjaan</label>
                            <div class="col-lg-10">
                                <vue-countdown v-on:time-expire="handleTimeExpire" :seconds="Number(items.waktu * 60)" :start="start"></vue-countdown>
                            </div>
                        </div>

                        <div class="form-group row" v-if="result.length > 0">
                            <label class="col-form-label col-lg-2">Hasil</label>
                            <div class="col-lg-10">
                                <div class="card">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Melankolis = {{result[0].Melankolis}} %</li>
                                        <li class="list-group-item">Plegmati = {{result[0].Plegmati}}%</li>
                                        <li class="list-group-item">Kolerik = {{result[0].Kolerik}}%</li>
                                        <li class="list-group-item">Sanguinis = {{result[0].Sanguinis}}%</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" v-model="id_quiz"/>
                        <div v-if="start" v-for="(item,index) in items.quiz_detail" :key="index">
                            <div class="form-group row">
                                <label class="d-block font-weight-semibold col-md-12">{{ index + 1 }}. {{ item.questions }}</label>
                                <div class="col-md-12">
                                    <ul class="soal">
                                        <li>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" v-model="answers[index]" :value="[{'choice':item.choice_a,'id_questions':item.id,'type_of_choice':item.type_of_choice_a}]">
                                                    A. {{ item.choice_a }}
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" v-model="answers[index]" :value="[{'choice':item.choice_b,'id_questions':item.id,'type_of_choice':item.type_of_choice_b}]">
                                                    B. {{ item.choice_b }}
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" v-model="answers[index]" :value="[{'choice':item.choice_c,'id_questions':item.id,'type_of_choice':item.type_of_choice_c}]">
                                                    C. {{ item.choice_c }}
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" v-model="answers[index]" :value="[{'choice':item.choice_d,'id_questions':item.id,'type_of_choice':item.type_of_choice_d}]">
                                                    D. {{ item.choice_d }}
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="text-right" v-if="start===false">
                        <button type="button" class="btn btn-primary" v-on:click="startTimer">Start Quiz</button>
                    </div>
                    <div class="text-right"  v-if="start">
                        <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import VueCountdown from '@dmaksimovic/vue-countdown';
    var moment = require('moment');
    export default {
        name: "StartQuiz",
        data : function () {
            return {
                start: false,
                items:[],
                id_quiz:'',
                loading: true,
                answers:[],
                result: [],
                date:''
            }
        },
        created() {
            this.getQuestion();
        },
        components: {
            'vue-countdown': VueCountdown,
        },
        methods: {
            async getQuestion() {
                setTimeout(() => {
                    this.date = moment().format('MMM d');

                    const data = {
                        'type': 'Personal Test'
                    }
                    axios.get('get_quiz',{params : data}).then((response)=>{
                        this.items = response.data.data
                        this.id_quiz = this.items.id
                        this.loading = false
                    });
                },500)
            },
            handleTimeExpire () {
                alert('Time is up!');
            },
            startTimer () {
                this.start = true;
            },
            sumbitForm(){
                let data = {
                    'id_quiz': this.id_quiz,
                    'answers': this.answers
                }

                axios.post('post_personal_quiz',data).then((response)=>{
                    if(response.data.status === '00') {
                        this.result = response.data.data
                        this.start= false
                    }
                });
            }
        }
    }
</script>

<style scoped>

</style>