import {PropsWithChildren} from 'react';
import { Head } from '@inertiajs/react';
import LandingLayout from "../Layouts/LandingLayout";

export default function AboutUs({}: PropsWithChildren) {
    return (
        <LandingLayout>
            <Head title="Welcome" />
            <div className={'text-3xl'}>About Us</div>
        </LandingLayout>
    );
}
