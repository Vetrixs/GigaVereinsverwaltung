<template>
  <v-container>
    <v-row>
      <v-col />
      <v-col>
        <v-card>
          <v-card-title>
            {{ form.id == null? 'Mitglied Hinzufügen' : 'Mitglied Bearbeiten' }}
          </v-card-title>
          <v-card-text>
            <Form :form="form" @submit="submit()" />
          </v-card-text>
        </v-card>
      </v-col>
      <v-col />
    </v-row>
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
   methods: {
      submit () {
         this.$inertia.post(this.route('member.store'), this.form)
      }
   },
}
</script>
