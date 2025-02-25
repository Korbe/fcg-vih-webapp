<template>

</template>
<script>
import LogoText from "@/Partials/LogoText.vue"
import {Popover, PopoverPanel, PopoverButton} from '@headlessui/vue'
import {CalendarIcon, BanknotesIcon, ChatBubbleLeftRightIcon, Bars3Icon, NewspaperIcon, UserGroupIcon, HomeIcon, XMarkIcon} from "@heroicons/vue/24/outline";
import Logo from "@/Partials/Logo.vue";

export default {
  name: 'mobile-menu',
    components: {
        LogoText,
        Logo,
        Popover, PopoverPanel, PopoverButton,
        CalendarIcon, BanknotesIcon, ChatBubbleLeftRightIcon, Bars3Icon, NewspaperIcon, UserGroupIcon, HomeIcon, XMarkIcon
    },
  props: {
    currentRoute: {},
    homeRoute: {},
    navigation: {}
  }
}
</script>
