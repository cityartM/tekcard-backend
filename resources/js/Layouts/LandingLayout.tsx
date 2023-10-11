import { PropsWithChildren } from 'react';
import Header from "@/Layouts/Header";
import {Link} from "@inertiajs/react";

export default function LandingLayout({ children }: PropsWithChildren) {
    return (
        <div className="">
            <Header />

            <div className="mt-10 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {children}
            </div>

            <div>
                <div>
                    <div className='d-flex gap-3'>
                        <p>Take control of your personal finances today</p>
                        <div className='d-flex gap-3'>
                            <div></div>
                            <div>
                                <p>Enter your email</p>
                            </div>
                            <Link href={'#'} className='d-flex gap-3'>
                                <p>Subscribe</p>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}
