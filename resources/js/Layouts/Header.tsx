import ApplicationLogo from "@/Components/ApplicationLogo";
import {Link, usePage} from "@inertiajs/react";

import React, {useEffect, useState, Fragment, PropsWithChildren} from 'react'
import { Dialog, Transition } from '@headlessui/react'
import { Bars3Icon, XMarkIcon, UserGroupIcon } from '@heroicons/react/24/outline'
import NavLink from "@/Components/NavLink";
import {User} from "@/types";

export default function Header() {
  const auth: {user: User} = usePage().props.auth as {user: User};
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);

  return (
    <HeaderElement className={`w-full z-50`}>
      <nav className="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div className="flex lg:flex-1">
          <Link href="/" className="-m-1.5 p-1.5">
            <span className="sr-only">Your Company</span>
            <ApplicationLogo className="h-8 w-auto" />
          </Link>
        </div>
        <div className="flex lg:hidden">
          <button
            type="button"
            className="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700"
            onClick={() => setMobileMenuOpen(true)}
          >
            <span className="sr-only">Open main menu</span>
            <Bars3Icon className="h-6 w-6" aria-hidden="true" />
          </button>
        </div>
        <div className="hidden lg:flex lg:flex-shrink-0 lg:gap-x-12">
          <DesktopNav />
        </div>
        <div className="hidden lg:flex lg:flex-1 lg:justify-end lg:gap-2">
          <DesktopAuthNav auth={auth} />
        </div>
      </nav>
      <MobileDialog mobileMenuOpen={mobileMenuOpen} setMobileMenuOpen={setMobileMenuOpen}>
        <div className="flex items-center justify-between">
          <Link href="/" className="-m-1.5 p-1.5">
            <span className="sr-only">Your Company</span>
            <ApplicationLogo className="h-8 w-auto" />
          </Link>
          <button
            type="button"
            className="-m-2.5 rounded-md p-2.5 text-gray-700"
            onClick={() => setMobileMenuOpen(false)}
          >
            <span className="sr-only">Close menu</span>
            <XMarkIcon className="h-6 w-6" aria-hidden="true" />
          </button>
        </div>
        <div className="mt-6 flow-root">
          <div className="-my-6 divide-y divide-gray-500/10">
            <div className="space-y-2 py-6">
              <MobileNav />
            </div>
            <div className="py-6">
              <MobileAuthNav auth={auth} />
            </div>
          </div>
        </div>
      </MobileDialog>
    </HeaderElement>
  )
}

const HeaderElement: React.FC<PropsWithChildren & {className?: string}> = ({className, children}) => {
  // make header transparent on landing page and white on other pages, and fixed when start scrolling
  const [headerClass, setHeaderClass] = useState('bg-transparent');
  const [headerShadow, setHeaderShadow] = useState('shadow-none');
  const [headerFixed, setHeaderFixed] = useState('absolute');

  useEffect(() => {
    function handleScroll() {
      if (window.scrollY > 0) {
        setHeaderClass('bg-sky-200/75 transition-bg');
        setHeaderShadow('shadow-lg shadow-slate-200 transition-shadow');
        setHeaderFixed('fixed');
      } else {
        setHeaderClass('bg-transparent transition-bg');
        setHeaderShadow('shadow-none transition-shadow');
        setHeaderFixed('absolute');
      }
    }

    window.addEventListener('scroll', handleScroll);
    return () => {
      window.removeEventListener('scroll', handleScroll);
    };
  }, []);
  return (
    <header className={`${className ?? 'w-full z-50'} ${headerClass} ${headerShadow} ${headerFixed}`}>
      {children}
    </header>
  );
}

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

const DesktopNav: () => React.ReactElement = () => {
  return (
    <>
      {navigation.map((item) => (
        <NavLink key={item.name} href={route(item.name)} active={route().current(item.name)} className="pb-2 text-sm font-semibold leading-6 text-gray-900">
          {item.label}
        </NavLink>
      ))}
    </>
  );
}

const DesktopAuthNav: React.FC<{auth: {user: User}}> = ({auth}) => {
  const {user} = auth;
  return (
    <>
      { (!user) ? (<>
        <a href={route('landing.login.get')} className={'py-2 px-4 inline-flex items-center gap-2 text-sm font-medium leading-5 transition duration-150 ease-in-out border rounded-md border-gray-400 text-gray-900 hover:border-gray-700 focus:outline-none focus:border-gray-700'}>
          <span>Login</span>
        </a>
        <a href={route('landing.register.get')} className={'py-2 px-4 inline-flex items-center gap-2 text-sm font-medium leading-5 transition duration-150 ease-in-out border rounded-md bg-[#2273AF] border-gray-400 text-gray-50 hover:text-white hover:bg-[#2273AF]/90 focus:outline-none focus:border-gray-700'}>
          <UserGroupIcon className="h-6 w-6" aria-hidden="true"/>
          <span>{'Create a Card'}</span>
        </a>
      </>) : (<>
        {/*<Link href={route('auth.front.logout')} method="post" as="button" className={'py-2 px-4 inline-flex items-center gap-2 text-sm font-medium leading-5 transition duration-150 ease-in-out border rounded-md border-gray-400 text-gray-900 hover:border-gray-700 focus:outline-none focus:border-gray-700'}>
                  <span>Logout</span>
                </Link>*/}
        <a href={route('dashboard')} className={'py-2 px-4 inline-flex items-center gap-2 text-sm font-medium leading-5 transition duration-150 ease-in-out border rounded-md bg-[#2273AF] border-gray-400 text-gray-50 hover:text-white hover:bg-[#2273AF]/90 focus:outline-none focus:border-gray-700'}>
          <UserGroupIcon className="h-6 w-6" aria-hidden="true"/>
          <span>{'Go to Dashboard'}</span>
        </a>
      </>)}
    </>
  );
}

const MobileNav: () => React.ReactElement = () => {
  return (
    <>
      {navigation.map((item) => (
        <Link
          key={item.name}
          href={route(item.name)}
          className="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50"
        >
          {item.label}
        </Link>
      ))}
    </>
  );
}

const MobileAuthNav: React.FC<{auth: {user: User}}> = ({}) => {
  // const {user} = auth;
  return (
    <>
      <a
        href="#"
        className="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50"
      >
        Log in
      </a>
    </>
  );
}

const MobileDialog: React.FC<PropsWithChildren & {mobileMenuOpen: boolean, setMobileMenuOpen: React.Dispatch<React.SetStateAction<boolean>>}> = ({mobileMenuOpen, setMobileMenuOpen, children}) => {
  return (
    <Transition
      show={mobileMenuOpen}
      as={Fragment}
    >
      <Dialog as="div" className="lg:hidden" onClose={setMobileMenuOpen}>
        <Transition.Child
          as={Fragment}
          enter="ease-out duration-300"
          enterFrom="opacity-0"
          enterTo="opacity-100"
          leave="ease-in duration-200"
          leaveFrom="opacity-100"
          leaveTo="opacity-0"
        >
          <div className="fixed inset-0 z-50 bg-black/30" />
        </Transition.Child>
        <Transition.Child
          as={Fragment}
          enter="ease-out duration-300"
          enterFrom="opacity-0 translate-x-full"
          enterTo="opacity-100 translate-x-0"
          leave="ease-in duration-200"
          leaveFrom="opacity-100 translate-x-0"
          leaveTo="opacity-0 translate-x-full"
        >
          <Dialog.Panel className="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            {children}
          </Dialog.Panel>
        </Transition.Child>
      </Dialog>
    </Transition>
  );
}
