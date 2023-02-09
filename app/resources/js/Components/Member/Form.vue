<template>
  <v-container>
    <v-form>
      <v-text-field
        v-model="form.name"
        :rules="[v => !!v|'Pflichtfeld']"
        label="Name"
        required
      />
      <v-text-field
        v-model="form.phone_number"
        prepend-icon="mdi-phone"
        :rules="[v => !!v|'Pflichtfeld']"
        label="Telefonnummer"
        required
      />
      <v-text-field
        v-model="form.email"
        prepend-icon="mdi-mail"
        :rules="[v => !!v|'Pflichtfeld']"
        label="E-Mail"
        required
      />
      <v-text-field
        v-model="form.iban"
        :rules="[v => !!v|'Pflichtfeld']"
        label="IBAN"
        required
      />
      <v-text-field
        v-model="form.birthday"
        type="date"
        :rules="[v => !!v|'Pflichtfeld']"
        label="Geburtsdatum"
        required
      />
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

   },
}
</script>
