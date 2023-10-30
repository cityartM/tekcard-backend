import React, {PropsWithChildren, useState} from "react";
import ApplicationLogo from "../Components/ApplicationLogo";
import {Link, useForm, usePage} from "@inertiajs/react";
import {User} from "@/types";
import Navigation from "@/Utils/Navigation";

const {routes, utility, social, address, tel, email} = Navigation.footer;

const Footer: React.FC<PropsWithChildren> = ({}) => {
  const auth: {user: User} = usePage().props.auth as {user: User};
  return (
    <div>
      <div className={'relative'}>
        <Subscribe />
        <footer className={'z-20 md:-mt-[10rem] max-w-7xl mx-auto py-10 px-6 md:pt-[16.5rem] md:pb-[8.5rem] md:px-10 rounded-3xl bg-[#ffffff]'}>
          <div className={' max-w-5xl mx-auto grid grid-cols-1 lg:grid-cols-7 gap-20'}>
            <div className={'col-span-2 flex flex-col gap-8'}>
              <ApplicationLogo className={'w-[11.125rem] h-[2.1875rem]'}/>
              <p className={'text-[1.28rem] font-normal leading-10'}>
                {'Lorem ipsum dolor siton secte turad ipisicing elit sed do eiusmod temporin cididunt Laoreet non sagittis aliquam bibendum.'}
              </p>
              <div className={'flex items-center gap-6'}>
                {
                  social && social.map(({name, icon: Icon}, index) => (
                    <Link href={route(name)} key={index}>
                      <Icon className={'w-8 h-8 text-[#2273AF]'} />
                    </Link>
                  ))
                }
              </div>
            </div>
            <div className={'col-span-full md:col-span-5 grid grid-cols-1 md:grid-cols-3 gap-y-8 gap-x-18'}>
              <div>
                <h3 className={'text-[1.875rem] text-[#2273AF] font-bold tracking-wide'}>
                  {'Menu'}
                </h3>
                <ul className={'mt-6 space-y-4 text-[1.28rem] font-normal leading-10'}>
                  {
                    routes && routes.map((item, index) => {
                      return (
                        <li key={index}>
                          <Link href={route(item.name)}>{item.label}</Link>
                        </li>
                      )
                    })
                  }
                </ul>
              </div>
              <div>
                <h3 className={'text-[1.875rem] text-[#2273AF] font-bold tracking-wide'}>
                  {'Utility pages'}
                </h3>
                <ul className={'mt-6 space-y-4 text-[1.28rem] font-normal leading-10'}>
                  {
                    utility && utility.map((item, index) => {
                      return (
                        <li key={index}>
                          <Link href={route(item.name)}>{item.label}</Link>
                        </li>
                      )
                    })
                  }
                </ul>
              </div>
              <div className={"space-y-6"}>
                <h3 className={'text-[1.875rem] text-[#2273AF] font-bold tracking-wide'}>
                  {address.label}
                </h3>
                <div className={"space-y-2"}>
                  <p className={'text-[1.28rem] font-normal leading-10'}>
                    {address.value}
                  </p>
                  <p className={'text-[1.28rem] font-normal leading-10'}>
                    <span>{("Phone: ")}</span><a href={`tel:${tel[0]}`} className="font-semibold text-gray-800">{tel[0]}</a>
                  </p>
                  <p className={'text-[1.28rem] font-normal leading-10'}>
                    <span>{("Email: ")}</span><a href={`mailto:${tel[0]}`} className="font-semibold text-gray-800">{email[0]}</a>
                  </p>
                </div>
                <button type="button" className={'flex-shrink-0 px-[3.6875rem] py-[1rem] w-full lg:w-auto h-[3.5rem] rounded-[4.5rem] border-sky-200 shadow-md text-white bg-gradient-to-r from-[#468dcb80] from-10% to-[#45c8f080] to-90% hover:to-100% hover:from-20% hover:shadow-lg'}>
                  {'Get A Quote'}
                </button>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
  )
}

const Subscribe = () => {
  const {data, setData, post, processing, errors, reset} = useForm({
    email: '',
  })
  const handleSubmit = (e: React.FormEvent<HTMLFormElement> ) => {
    e.preventDefault();
    post(route('subscriptions.store'), {
      preserveScroll: true,
      onSuccess: () => {
        reset('email');

        alert('Message sent successfully!');
      },
      onError: () => {
        alert('Message failed to send!');
      }
    });
  };
  const handleChanges = (e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement>) => {
    setData('email', e.target.value);
  }

  return (
    <div className={'z-30 relative max-w-5xl mx-auto py-10 px-6 md:py-20 md:px-10 rounded-3xl bg-gradient-to-r from-[#468dcb80] from-10% to-[#45c8f080] to-90%'}>
      <form onSubmit={(event) => handleSubmit(event)} className={'max-w-lg mx-auto lg:max-w-5xl flex flex-col lg:flex-row items-center gap-8'}>
        <p
          className={'flex-grow text-center lg:text-start text-white text-[2rem] md:text-[2.5rem] lg:text-[2.5rem] font-bold'}>
          {'Take control of your personal finances today'}
        </p>
        <input
          type="text"
          placeholder={'Enter your email'}
          value={data['email']}
          onChange={(event) => handleChanges(event)}
          className={'flex-shrink-0 w-full lg:w-[18rem] h-[3.5rem] px-[2rem] py-[1rem] rounded-[4.5rem] hover:shadow border-sky-900 border hover:border-sky-200 focus:border-sky-200 focus:outline-none text-[1.28rem] font-normal leading-10'}
        />
        <button
          type="submit"
          className={'flex-shrink-0 px-[3.6875rem] py-[1rem] w-full lg:w-auto h-[3.5rem] rounded-[4.5rem] border-sky-200 shadow-md text-white bg-gradient-to-r from-[#468dcb80] from-10% to-[#45c8f080] to-90% hover:to-100% hover:from-20% hover:shadow-lg'}
        >
          {'Subscribe'}
        </button>
      </form>
    </div>
  );
}

export default Footer;
