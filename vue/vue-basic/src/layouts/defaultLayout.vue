
<template>
  <div>
    <header-layout />
    <main>
			<h1>Here might be a page title</h1>
      <slot />
		</main>
    <footer-layout />
  </div>
</template>

<script>
import headerLayout from '@/components/Header.vue'
import footerLayout from '@/components/Footer.vue'
export default {
	components: {
		headerLayout,
		footerLayout
	}
}
</script>
