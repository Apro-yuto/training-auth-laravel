<template>
    <p>Homeダオ。TEST</p>
    <p>{{ $page.props.user }}</p>

</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'

export default defineComponent({
    components: {
        AppLayout,
    },
})
</script>
