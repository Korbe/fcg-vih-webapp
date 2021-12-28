<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Team Settings
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <update-team-name-form :permissions="permissions" :team="team"/>

                <team-member-manager :available-roles="availableRoles"
                                     :team="team"
                                     :user-permissions="permissions"
                                     class="mt-10 sm:mt-0"/>

                <template v-if="permissions.canDeleteTeam && ! team.personal_team">
                    <jet-section-border/>

                    <delete-team-form :team="team" class="mt-10 sm:mt-0"/>
                </template>
            </div>
        </div>
    </app-layout>
</template>

<script>
import TeamMemberManager from './TeamMemberManager'
import AppLayout from '@/Layouts/AppLayout'
import DeleteTeamForm from './DeleteTeamForm'
import JetSectionBorder from '@/Jetstream/SectionBorder'
import UpdateTeamNameForm from './UpdateTeamNameForm'

export default {
    props: [
        'team',
        'availableRoles',
        'permissions',
    ],

    components: {
        AppLayout,
        DeleteTeamForm,
        JetSectionBorder,
        TeamMemberManager,
        UpdateTeamNameForm,
    },
}
</script>
