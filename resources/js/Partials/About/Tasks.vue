<template>
    <div class="relative bg-white py-4 pb-32 lg:pt-2">
        <div class="mx-auto max-w-md px-4 text-center sm:max-w-3xl sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="mt-16">
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-2">
                    <div v-for="task in tasks" :key="task.name" class="pt-6">
                        <div class="flow-root rounded-lg bg-gray-50 px-6 pb-8">
                            <div class="-mt-6">
                                <div>
                                  <span class="inline-flex items-center justify-center rounded-md bg-brand-primary p-3 shadow-lg">
                                    <component :is="task.icon" class="h-6 w-6 text-white" aria-hidden="true" />
                                  </span>
                                </div>
                                <h3 class="mt-8 text-lg font-medium tracking-tight text-gray-900">{{ task.name }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {
    ShieldCheckIcon,
    MegaphoneIcon,
    SparklesIcon,
    UserGroupIcon
} from '@heroicons/vue/24/outline';

const tasks = [
    {
        name: 'Jesus Christus als Retter der Welt verkündigen',
        description: 'Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.',
        icon: MegaphoneIcon,
    },
    {
        name: 'Gemeinschaft miteinander pflegen',
        description: 'Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.',
        icon: UserGroupIcon,
    },
    {
        name: 'Uns gegenseitig unterstützen',
        description: 'Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.',
        icon: ShieldCheckIcon,
    },
    {
        name: 'Unseren Glauben gemeinsam feiern',
        description: 'Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.',
        icon: SparklesIcon,
    },
];
</script>

