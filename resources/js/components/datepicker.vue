import Datepicker from 'vuejs-datepicker';
Vue.use(Datepicker);

<template>
    <div id="c-date">
        <div class="center">
            <h1>Select a date</h1>
            <Datepicker v-model="date"></Datepicker>
        </div>
    </div>
</template>

<script>
    

    export default {
        name: 'c-date',
        components: {
            Datepicker
        },
        data: function(){
          return {
            date: new Date(2020, 0,  11)
          }
        }
    }
</script>

<style>
    .center {
        width: 50%;
        margin: 0 auto;
    }
</style>