<template>

</template>
<script>
import LogoText from "@/Partials/LogoText"
import {Popover, PopoverPanel, PopoverButton} from '@headlessui/vue'
import {CalendarIcon, CashIcon, ChatAlt2Icon, MenuAlt3Icon, NewspaperIcon, UserGroupIcon, HomeIcon, XIcon} from "@heroicons/vue/outline";
import Logo from "@/Partials/Logo";

export default {
  name: 'mobile-menu',
    components: {
        LogoText,
        Logo,
        Popover, PopoverPanel, PopoverButton,
        CalendarIcon, CashIcon, ChatAlt2Icon, MenuAlt3Icon, NewspaperIcon, UserGroupIcon, HomeIcon, XIcon
    },
  props: {
    currentRoute: {},
    homeRoute: {},
    navigation: {}
  }
}
</script>
