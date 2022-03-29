<template>
    <Popover as="div" class="relative z-10">
        <nav class="relative max-w-7xl mx-auto flex items-center justify-between pt-6 pb-2 px-4 sm:px-6 lg:px-8" aria-label="Global">
            <div class="flex items-center flex-1">
                <div class="flex items-center justify-between w-full lg:w-auto">
                    <Link href="/">
                        <span class="sr-only">FCG Villach</span>
                        <LogoText class="h-12 w-auto lg:h-12"></LogoText>
                    </Link>

                    <div class="-mr-2 flex items-center lg:hidden">
                        <PopoverButton
                            :class="[hasBackground ? 'text-white focus:ring-white' : 'text-gray-500',
                            'bg-brand-primary-500 bg-opacity-0 rounded-md p-2 inline-flex items-center justify-center hover:text-white hover:bg-opacity-100 focus:outline-none focus:ring-2 focus-ring-inset']"
                            class="">
                            <span class="sr-only">Open main menu</span>
                            <MenuIcon class="h-6 w-6" aria-hidden="true"/>
                        </PopoverButton>
                    </div>
                </div>
                <div class="hidden space-x-10 lg:flex lg:ml-10">

                    <Link v-if="$page.props.user" :href="route('dashboard.home')"
                          :class="[hasBackground ? 'text-white hover:text-brand-primary-300' : 'text-gray-500 hover:text-gray-900', 'text-base font-medium ']">Dashboard</Link>

                    <Link v-for="item in navigation" :key="item.name" :href="item.href"
                                  :class="[hasBackground ? 'text-white hover:text-brand-primary-300' : 'text-gray-500 hover:text-gray-900', 'text-base font-medium ']"

                                  >{{ item.name }}</Link>
                </div>
            </div>
        </nav>

        <!-- Mobile Menu -->
        <transition enter-active-class="duration-150 ease-out" enter-from-class="opacity-0 scale-95" enter-to-class="opacity-100 scale-100" leave-active-class="duration-100 ease-in"
                    leave-from-class="opacity-100 scale-100" leave-to-class="opacity-0 scale-95">
            <PopoverPanel focus class="absolute top-0 inset-x-0 p-2 transition transform origin-top lg:hidden">
                <div class="rounded-lg shadow-lg bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
                    <div class="pt-5 pb-6 px-5">
                        <div class="flex items-center justify-between">
                            <div>
                                <Logo class="h-12 w-auto" />

                            </div>

                            <Link href="/" class="text-gray-500 hover:text-gray-900 text-lg font-medium">FCG Villach</Link>

                            <div class="-mr-2">
                                <PopoverButton
                                    class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-brand-primary">
                                    <span class="sr-only">Close menu</span>
                                    <XIcon class="h-6 w-6" aria-hidden="true"/>
                                </PopoverButton>
                            </div>
                        </div>

                        <div class="mt-6">
                            <nav class="grid gap-y-8">
                                <Link v-for="item in navigation" :key="item.name" :href="item.href" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                                    <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-brand-primary text-white sm:h-12 sm:w-12">
                                        <component :is="item.icon" class="h-6 w-6" aria-hidden="true" />
                                    </div>
                                    <span class="ml-3 text-base font-medium text-gray-500">
                                    {{ item.name }}
                                </span>
                                </Link>
                            </nav>
                        </div>
                    </div>
                </div>
            </PopoverPanel>
        </transition>
    </Popover>
</template>

<script>
import {Popover, PopoverButton, PopoverPanel} from '@headlessui/vue'
import {MenuIcon, XIcon, UserGroupIcon, ChatAlt2Icon, NewspaperIcon, CalendarIcon, CashIcon} from "@heroicons/vue/outline";
import Logo from "@/Partials/Logo";
import LogoText from "@/Partials/LogoText";

export default {
    name: "Nav",
    components: {
        LogoText,
        Logo,
        Popover, PopoverButton, PopoverPanel, MenuIcon, XIcon
    },
    props: {
      hasBackground: {
          type: Boolean,
      }
    },
    data() {
        return {
            navigation: [
                {name: 'Über uns', href: route('public.about'), icon: UserGroupIcon},
                {name: 'Events', href: route('public.events'), icon: CalendarIcon},
                {name: 'Predigten', href: route('public.blog'), icon: NewspaperIcon},
                {name: 'Kontakt', href: route('public.contact'), icon: ChatAlt2Icon},
                {name: 'Spenden', href: route('public.donate'), icon: CashIcon},
            ]
        }
    },
}
</script>
