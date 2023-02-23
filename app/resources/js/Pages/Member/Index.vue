<template>
  <v-container>
    <v-data-table
      :headers="headers"
      :items="members"
      item-key="name"
      :search="search"
    >
      <template #top>
        <v-row>
          <v-col>
            <v-text-field
              v-model="search"
              label="Search"
              class="mx-4"
            />
          </v-col>
          <v-col cols="2">
            <inertia-link :href="route('member.create')">
              <v-btn prepend-icon="mdi-add" variant="tonal,">
                add
              </v-btn>
            </inertia-link>
          </v-col>
        </v-row>
      </template>
      <template #[`item.actions`]="{ item }">
        <div>
          <inertia-link :href="route('member.edit', {member:item.id})">
            <v-icon>
              mdi-pen
            </v-icon>
          </inertia-link>
        </div>
      </template>
    </v-data-table>
  </v-container>
</template>
<script>

import Layout from '@/Layout/main'

export default {
   layout: (h, page) => h(Layout, [page]),
   props: { // Data from the Controller is Imutable
      members: {
         required: true,
         type: Array
      }
   },
   data () { // On page Data can be Changed
      return {
         search: '',
         headers: [

            { text: 'Name', value: 'name' },
            { text: 'Telefonnummer', value: 'phone_number' },
            { text: 'E-Mail', value: 'email_address' },
            { text: 'Arbeitet', value: 'is_employed' },
            { text: 'Geburtstag', value: 'birthday' },
            { text: 'Iban', value: 'iban' },
            { text: 'Straße', value: 'street' },
            { text: 'Stadt', value: 'city' },
            { text: 'Bundesland', value: 'state' },
            { text: 'Postleitzahl', value: 'postal_code' },
            { text: 'Aktionen', value: 'actions' }
         ]
      }
   },
   methods: {
      // add () {
      //    window.location.href = 'http://gigavereinsverwaltung.test/create'
      // }
   }
}
</script>
