<template>
  <v-container>
    <v-form ref="form">
      <v-text-field
        v-model="form.street"
        prepend-icon="mdi-home-outline"
        :rules="[v => !!v||'Pflichtfeld']"
        label="Street"
        required
      />
      <v-text-field
        v-model="form.city"
        prepend-icon="mdi-location_city-outline"
        :rules="[v => !!v||'Pflichtfeld']"
        label="City"
        required
      />
      <v-text-field
        v-model="form.state"
        prepend-icon="mdi-location_city-outline"
        :rules="[v => !!v||'Pflichtfeld']"
        label="State"
        required
      />
      <v-text-field
        v-model="form.postal_code"
        prepend-icon="mdi-location_city-outline"
        :rules="[v => !!v||'Pflichtfeld']"
        label="Postal Code"
        required
      />
      <v-btn @click="submit()">
        Speichern
      </v-btn>
    </v-form>
  </v-container>
</template>
<script>

export default {
   props: { // Data from the Parent
      form: {
         required: true,
         type: Object
      }
   },
   data: function () { // On page Data can be Changed
      return {
         valid: true
      }
   },
   methods: {
      submit () {
         if (this.$refs.form.validate()) {
            this.$emit('submit')
         } else {
            this.valid = false
         }
      }
   },
}
</script>
