<template>

  <button type="button" class="btn bg-marigold text-snow d-flex my-2  font-weight-bold  ">
    <a  :href="href" class="display-5"> {{ text }} </a>
  </button>
          
</template>

<script>

export default {
  name: 'NavButton',
  components: {
  },
  props: {
    text : {
      type : String,
      required : true
    },
    href : {
      type : String,
      default : '#'
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">


</style>
