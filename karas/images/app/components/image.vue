<template>
    <!--<header-component/>-->
    <div class="karas-image">
        <img :src="$url(image.src)" :alt="image.filename">

    </div>
    <!--<other-component/>-->
</template>
<style>
    body{
        background-color:#ff0000;
    }
</style>
<script>
   // import HeaderComponent from './components/header.vue'
  //  import OtherComponent from './components/other.vue'
   module.exports = {


       props: ['image'],


   };



</script>