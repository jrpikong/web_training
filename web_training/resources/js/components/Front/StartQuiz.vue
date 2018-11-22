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
                                {{ items.waktu }} Sisa waktu
                                <Countdown end="2018-11-21 08:50:22"></Countdown>
                            </div>
                        </div>
                        <div v-for="(item,index) in items.quiz_detail" :key="index">
                            <div class="form-group row">
                                <label class="d-block font-weight-semibold col-md-12">{{ index + 1 }}. {{ item.questions }}</label>
                                <div class="col-md-12">
                                    <ul class="soal">
                                        <li>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" v-model="answer.choice[index]" :value="item.type_of_choice_a" :name="'answers['+index+'][jawaban]'">
                                                    A. {{ item.choice_a }}
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" v-model="answer.choice[index]" :value="item.type_of_choice_b" :name="'answers['+index+'][jawaban]'">
                                                    B. {{ item.choice_b }}
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" v-model="answer.choice[index]" :value="item.type_of_choice_c" :name="'answers['+index+'][jawaban]'">
                                                    C. {{ item.choice_c }}
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" v-model="answer.choice[index]" :value="item.type_of_choice_d" :name="'answers['+index+'][jawaban]'">
                                                    D. {{ item.choice_d }}
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
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
    </div>
</template>

<script>
    import Countdown from 'vuejs-countdown'
    export default {
        name: "StartQuiz",
        data : function () {
            return {
                items:[],
                loading: true,
                answer:{
                    choice: [],
                    id: [],
                },
                answers: [],
                date:''
            }
        },
        created() {
            this.getQuestion();
        },
        components: { Countdown },
        methods: {
            async getQuestion() {
                setTimeout(() => {
                    var now = new Date();

                    this.date = now.format("m d");

                    const data = {
                        'type': 'Personal Test'
                    }
                    axios.get('get_quiz',{params : data}).then((response)=>{
                        this.items = response.data.data
                        this.loading = false
                    });
                },500)
            }
        }
    }
</script>

<style scoped>

</style>