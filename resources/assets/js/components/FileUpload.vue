<template>
    <div class="row">
        <div class="">
            <img :src="image" class="img-responsive">
        </div>
        <div class="" style="overflow-wrap: break-word; overflow: hidden;">
            <form>
                <p for="files" class="btn btn-primary" v-on:change="onFileChange" style="padding: 0px 0px 0px -1px;margin: 0 auto;">Выберите изображение...
                </p>
                <input type="file" id="files" v-on:change="onFileChange" style="padding: 0px 0px 10px 20px;margin: 0 auto;">
            </form>
        </div>
    </div>
</template>
<style scoped>
    img{
        max-height: 36px;
    }
</style>
<script>
    export default{
        data(){
            return {
                image: ''
            }
        },
        methods: {
            onFileChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            upload(){
                axios.post('/api/upload',{image: this.image}).then(response => {

                });
            }
        }
    }
</script>