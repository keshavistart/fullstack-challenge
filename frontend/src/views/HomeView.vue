<template>
  <main class="container text-white py-6">
    <div class="flex flex-col gap-4">
      <Suspense>
        <UserList />
        <template #fallback>
          <UserCardSkeleton />
        </template>
      </Suspense>
    </div>
  </main>
</template>

<script setup>
import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";
import UserCardSkeleton from "../components/UserCardSkeleton.vue";
import UserList from "../components/UserList.vue";

const router = useRouter();
</script>

<style lang="scss" scoped></style>
