<template>

   <div>
       <label for="image-file">Image file</label>
       <input type="file" name="file" id="image-file" />
   </div>

</template>

<script>

    module.exports = {

        props: ['post', 'data', 'form'],

        section: {
            label: 'Images'
        }

    };

</script>
