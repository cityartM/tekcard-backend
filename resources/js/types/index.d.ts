import { PageProps as TPageProps } from '@inertiajs/core';

export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at: string;
}

export type PageProps<T extends TPageProps> = T & {
    auth: {
        user: User;
    };
};

export type Errors = Record<string, string>;
export type ErrorBag = Record<string, Errors>;
