import {PropsWithChildren} from 'react';
import { Head } from '@inertiajs/react';
import LandingLayout from "./../Layouts/LandingLayout";

export default function Home({}: PropsWithChildren) {
    return (
        <LandingLayout>
            <Head title="Welcome" />
            <div className={'bg-red-500'}>Home</div>
        </LandingLayout>
    );
}
