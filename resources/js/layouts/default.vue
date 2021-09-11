<template>
  <div class="main-layout">
    <Header />

    <div class="container mt-4">
      <child />
    </div>
  </div>
</template>

<script>
import Header from '../components/Header'

export default {
  name: 'MainLayout',

  components: {
    Header
  }
}
</script>
