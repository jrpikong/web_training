<template>
    <div class="card my-3">
        <PDFDocument v-bind="{ url, scale}" />
    </div>
</template>

<script>
    import pdf from 'vue-pdf'
    let loadingTask = pdf.createLoadingTask('http://localhost:8000/storage/training/training_1.pdf');
    export default {
        name: "FollowTraining",
        components: {
            pdf
        },
        data() {
            return {
                src: loadingTask,
                numPages: undefined,
                scale: 2,
                url : "http://localhost:8000/storage/training/training_1.pdf"
            }
        },
        mounted() {
            this.src.then(pdf => {
                this.numPages = pdf.numPages;
            });
        }
    }
</script>

<style scoped>

</style>

