<template>
  <v-container>
    <v-form ref="form">
      <v-text-field
        v-model="form.name"
        prepend-icon="mdi-card-account-details-outline"
        :rules="[v => !!v||'Pflichtfeld']"
        label="Name"
        required
      />
      <v-text-field
        v-model="form.phone_number"
        prepend-icon="mdi-phone"
        :rules="[v => !!v||'Pflichtfeld']"
        label="Telefonnummer"
        required
      />
      <v-text-field
        v-model="form.email_address"
        prepend-icon="mdi-at"
        :rules="[v => !!v||'Pflichtfeld']"
        label="E-Mail"
        required
      />
      <v-text-field
        v-model="form.iban"
        prepend-icon="mdi-bank"
        :rules="[v => !!v||'Pflichtfeld']"
        label="IBAN"
        required
      />
      <v-text-field
        v-model="form.birthday"
        prepend-icon="mdi-calendar-range"
        type="date"
        :rules="[v => !!v||'Pflichtfeld']"
        label="Geburtsdatum"
        required
      />
      <v-checkbox
        v-model="form.is_employed"
        prepend-icon="mdi-briefcase"
        label="Arbeitet"
        required
      />
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
