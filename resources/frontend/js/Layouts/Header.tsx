import React, {PropsWithChildren} from "react";
import ApplicationLogo from "./../Components/ApplicationLogo";
import {Link} from "@inertiajs/react";
import NavLink from "./../Components/NavLink";
import {BarsIcon, UsersIcon} from "./../Components/Icons";

const navigation = [
    {
        label: 'Home',
        name: 'landing.home',
    },
    {
        label: 'About us',
        name: 'landing.about-us',
    },
    {
        label: 'Blog',
        name: 'landing.blog',
    },
    {
        label: 'Pricing',
        name: 'landing.pricing',
    },
    {
        label: 'Contact us',
        name: 'landing.contact-us',
    },
];

const Header: React.FC<PropsWithChildren> = ({}: PropsWithChildren) => {
    return (
        <header>
            <div className={'md:hidden block py-6 w-full'}>
                <div className={'px-6 flex items-center justify-between'}>
                    <Link href="/">
                        <ApplicationLogo className="h-8" />
                    </Link>
                    <div className={'flex items-center gap-2'}>
                        <button type="button" className={'py-2 px-2 inline-flex items-center gap-2 text-sm font-medium leading-5 transition duration-150 ease-in-out text-gray-900 focus:outline-none focus:border-gray-700'}>
                            <BarsIcon />
                        </button>
                    </div>
                </div>
            </div>

            <div className={'hidden md:block py-6 w-full'}>
                <div className={'mx-auto max-w-7xl flex flex-col gap-4'}>
                    <div className={'px-6 flex items-center justify-between'}>
                        <Link href="/">
                            <ApplicationLogo className="h-8" />
                        </Link>
                        <div className={'flex items-center gap-2'}>
                            <a href={route('login')} className={'py-2 px-4 inline-flex items-center gap-2 text-sm font-medium leading-5 transition duration-150 ease-in-out border rounded-md border-gray-400 text-gray-900 hover:border-gray-700 focus:outline-none focus:border-gray-700'}>
                                <span>Login</span>
                            </a>
                            <a href={route('register')} className={'py-2 px-4 inline-flex items-center gap-2 text-sm font-medium leading-5 transition duration-150 ease-in-out border rounded-md bg-[#2273AF] border-gray-400 text-gray-50 hover:text-white hover:bg-[#2273AF]/90 focus:outline-none focus:border-gray-700'}>
                                <UsersIcon />
                                <span>Create a Card</span>
                            </a>
                        </div>
                    </div>
                    <nav className={'py-4 flex items-center justify-center gap-8'}>
                        { navigation.map((item, index) => (
                            <NavLink href={route(item.name)} active={route().current(item.name)} key={index} className={'py-2 border-b-4'}>
                                {item.label}
                            </NavLink>
                        )) }
                    </nav>
                </div>
            </div>
        </header>
    );
};
export default Header;
