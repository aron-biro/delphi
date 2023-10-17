<template>
    <div :class="`text-${textSize} font-bold text-${textColor}`">Delphi</div>
</template>

<script setup>
const props = defineProps({
  textColor: {
    type: String,
    required: true,
  },
  textSize:{
    type: String,
    required: true,
  }
});

</script>
