<template>
  <v-app>
    <v-main class="background">
      <v-container
        fluid
      >
        <slot />
      </v-container>
      <Footer />
    </v-main>
  </v-app>
</template>

<script>

export default {
   name: 'BasicLayout',
}
</script>
