<template>
    <div>
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title">Visitor Statistics</h6>
                    </div>
                    <div class="card-body py-0">
                        <GChart
                            type="ColumnChart"
                            :data="chartData"
                            :options="chartOptions"
                        />
                    </div>
                </div>

            </div>

            <div class="col-xl-4">

                <!-- Sales stats -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title">Data Statistics</h6>
                    </div>

                    <div class="card-body py-0">
                        <div class="row text-center">
                            <div class="col-6">
                                <div class="mb-3">
                                    <h5 class="font-weight-semibold mb-0">{{ users }} Member</h5>
                                    <span class="text-muted font-size-sm">Total Users</span>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <h5 class="font-weight-semibold mb-0">{{ training }} Test</h5>
                                    <span class="text-muted font-size-sm">Total Training</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /sales stats -->
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "DashBoard",
        data () {
            return {
                // Array will be automatically processed with visualization.arrayToDataTable function
                users: 0,
                training: 0,
                chartData: [],
                chartOptions: {
                    chart: {
                        title: 'Total Page View',
                        subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                    }
                }
            }
        },
        created() {
            this.getanalytic()
        },
        methods: {
            getanalytic:function () {
               axios.get('/analytic').then((response)=>{
                   this.chartData=response.data.visitors;
                   this.users=response.data.users;
                   this.training=response.data.total_training;
               });
            }
        }
    }
</script>

<style scoped>

</style>