import {PropsWithChildren} from 'react';
import { Head } from '@inertiajs/react';
import LandingLayout from "../Layouts/LandingLayout";

export default function ContactUs({}: PropsWithChildren) {
    return (
        <LandingLayout>
            <Head title="Welcome" />
            <div className={'text-3xl'}>Contact Us</div>
        </LandingLayout>
    );
}
