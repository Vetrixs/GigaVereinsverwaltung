<template>
  <v-container>
    <v-row>
      <v-col />
      <v-col>
        <v-card>
          <v-card-title>
            {{ form.id == null? 'Adresse Hinzufügen' : 'Adresse Bearbeiten' }}
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
import Form from '@/Components/Address/Form'
export default {
   components: {
      Form
   },
   layout: (h, page) => h(Layout, [page]),
   props: { // Data from the Controller is Imutable
      address: {
         required: true,
         type: Object
      }
   },
   data () { // On page Data can be Changed
      return {
         form: this.$inertia.form({
            ...this.address
         })
      }
   },
   methods: {
      submit () {
         this.$inertia.post(this.route('address.store'), this.form)
      }
   },
}
</script>
