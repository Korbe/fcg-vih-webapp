<template>

    <div class="pb-16 bg-gradient-to-b from-white to-gray-50">
        <div class="max-w-7xl mx-auto py-12 px-4 text-center sm:px-6 lg:px-8 lg:py-24">
            <div class="space-y-12">
                <ul role="list" class="mx-auto space-y-16 sm:grid sm:grid-cols-2 sm:gap-16 sm:space-y-0 lg:grid-cols-3 lg:max-w-5xl">
                    <li v-for="person in team" :key="person.name">
                        <div class="space-y-6">
                            <img class="mx-auto h-40 w-40 rounded-full xl:w-48 xl:h-48" :src="person.imageUrl" alt=""/>
                            <div class="space-y-2">
                                <div class="text-lg leading-6 font-medium space-y-1">
                                    <h3>{{ person.name }}</h3>
                                    <p class="text-brand-primary-600">{{ person.role }}</p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Team",
    data() {
        return {
            team: [
                {
                    name: 'Christian Korbitsch ',
                    role: 'Pastor',
                    imageUrl: 'images/portraits/Christian-Korbitsch.png',
                },
                {
                    name: 'Erika Korbitsch ',
                    role: 'Lobpreisleitung',
                    imageUrl: 'images/portraits/Erika-Korbitsch.jpeg',
                },
                {
                    name: 'Andrea Kirisits',
                    role: 'Kindergottesdienste',
                    imageUrl: 'images/portraits/Andrea-Kirisits.jpeg',
                },
                {
                    name: 'Markus Kirisits',
                    role: 'Kassier & Schriftführer',
                    imageUrl: 'images/portraits/Markus-Kirisits.jpeg',
                },
                {
                    name: 'Majid Khosravian',
                    role: 'Übersetzer',
                    imageUrl: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
                },
                {
                    name: 'Bettina Morgan',
                    role: 'Moderation',
                    imageUrl: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
                },

            ]
        }
    }
}
</script>
