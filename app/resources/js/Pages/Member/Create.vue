<template>
  <v-container>
    <Form :form="form" />
  </v-container>
</template>
<script>

import Layout from '@/Layout/main'
import Form from '@/Components/Member/Form'
export default {
   components: {
      Form
   },
   layout: (h, page) => h(Layout, [page]),
   props: { // Data from the Controller is Imutable
      member: {
         required: true,
         type: Object
      }
   },
   data () { // On page Data can be Changed
      return {
         form: this.$inertia.form({
            ...this.member
         })
      }
   },
}
</script>
