<template>
  <div class="bx">
    <div class="img">{{ propA.img }} </div>
    <h3>{{ propA.title }}</h3>
  </div>
</template>

<script>
export default {
	props: {
		propA: {
			type: Object,
			required: true,
			default: null
		}
	}
}
</script>
