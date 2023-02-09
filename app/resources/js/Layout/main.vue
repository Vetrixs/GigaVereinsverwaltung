<template>
  <v-app>
    <v-main class="background">
      <v-container
        fluid
      >
        <Alert dismissible />
        <flash-messages />
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
