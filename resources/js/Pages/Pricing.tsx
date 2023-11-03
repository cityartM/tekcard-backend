import React, {PropsWithChildren, useEffect, useState} from 'react';
import {Head, usePage} from '@inertiajs/react';
import LandingLayout from "../Layouts/LandingLayout";
import {Feature, Plan} from "@/types/pricing";
import usePricing from "@/Utils/Pricing";
import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";

import {CheckBadgeIcon, UserIcon, UsersIcon} from "@heroicons/react/24/solid";

export default function Pricing({}: PropsWithChildren) {
  const plans: Plan[] = (usePage().props?.plans ?? []) as Plan[];
  const features: Feature[] = (usePage().props?.features ?? []) as Feature[];

  const {filteredPlans, filterPlans, filters, handleFilters} = usePricing(plans);

  useEffect(() => {
    filterPlans(filters.type, filters.billing);
  }, [filters]);

  const Button = ({active = false, ...props}) => {
    return active ? <PrimaryButton {...props} /> : <SecondaryButton {...props} />
  }

  return (
    <LandingLayout>
      <Head title="Welcome" />

      <Section className="py-20 px-10 justify-center bg-gradient-to-tr to-pink-100 from-white bg-opacity-20">
        <div className="pt-20 grid grid-cols-1 gap-y-10 md:gap-y-16 lg:gap-y-20">
          <div
            className={'text-center text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold text-[#2273AF]'}>{'Pricing'}</div>
          <div
            className={'mx-auto max-w-5xl text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-center text-slate-700'}>
            <div className="text-2xl font-bold text-[#2273AF]">{'Pricing plans for everyone'}</div>
            <div className="text-xl font-bold text-[#2273AF]">{'Choose the plan that is right for you or your organization.'}</div>
          </div>
        </div>

        <div className={'mt-20 mx-auto max-w-md'}>
          <div className="grid grid-cols-1 sm:grid-cols-2 gap-8">
            <Button className="py-4 px-6 flex items-center gap-4" active={filters.type === 'Client'} onClick={(e: any) => handleFilters(e, 'type', 'Client')}>
              <UserIcon className="h-10 text-[#2273AF]" />
              <span className="text-xl font-semibold">{'Personal'}</span>
            </Button>
            <Button className="py-4 px-6 flex items-center gap-4" active={filters.type === 'Company'} onClick={(e: any) => handleFilters(e, 'type', 'Company')}>
              <UsersIcon className="h-10 text-[#2273AF]" />
              <span className="text-xl font-semibold">{'Company'}</span>
            </Button>
          </div>
          <div className="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-8">
            <Button className="py-4 px-6 flex items-center gap-4" active={filters.billing === 'Monthly'} onClick={(e: any) => handleFilters(e, 'billing', 'Monthly')}>
              <span className="text-xl font-semibold">{'Monthly'}</span>
            </Button>
            <Button className="py-4 px-6 flex items-center gap-4" active={filters.billing === 'Yearly'} onClick={(e: any) => handleFilters(e, 'billing', 'Yearly')}>
              <span className="text-xl font-semibold">{'Yearly'}</span>
            </Button>
          </div>
        </div>

        <div className="my-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

          {filteredPlans && filteredPlans.map((plan: Plan) => (
            <div className="px-2 py-4 flex flex-col bg-[#F2F2F2] border border-[#D7D7D7] rounded-2xl shadow overflow-hidden">
              <div className="flex-shrink-0 px-4">
                <div className="relative p-6 bg-[#91D6E5] rounded-2xl overflow-hidden">
                  <div className="text-3xl font-bold text-sky-700">{plan.display_name}</div>
                  <div className="mt-6 flex items-center gap-4">
                    <UserIcon className="h-8 text-sky-700" />
                    <div className='text-lg font-bold text-sky-700'>{plan.nbr_user} Users</div>
                  </div>
                </div>
                <div className="py-8 flex items-center justify-between">
                  <div className="text-2xl font-semibold text-sky-700">$ {plan.price}</div>
                  <div className="text-2xl font-semibold text-sky-700">{plan.duration}</div>
                </div>
              </div>
              <div className="flex-grow bg-white rounded-2xl overflow-hidden">
                <ul className="px-6 py-8 list-disc space-y-2">
                  {plan.features.map((feature: Feature) => (
                    <li className="text-lg" key={feature.id}>{feature.display_name}</li>
                  ))}
                </ul>
              </div>
              <div className="flex-shrink-0 px-6 py-4 bg- rounded-b-2xl overflow-hidden">
                <button className="w-full px-8 py-4 bg-[#D7D7D7] rounded-full text-[#2273AF] text-lg font-bold">
                  {'Get Started'}
                </button>
              </div>
            </div>
          ))}

        </div>

        <div className={'hidden lg:block'}>

          <div className="my-10">
            <div className="bg-slate-50 rounded border border-slate-200 justify-start items-start flex">
              <div className="Title grow shrink basis-0 border-r border-slate-200 flex-col justify-start items-start inline-flex">
                <div className="Div self-stretch h-44 px-8 py-5 border-b border-slate-200 flex-col justify-center items-start gap-3 flex">
                  <div className="Frame30 self-stretch justify-start items-center gap-4 inline-flex">
                    <div className="ComparePlans text-sky-700 text-2xl font-bold font-['Tajawal']">Compare plans</div>
                  </div>
                </div>
                <div className="Div self-stretch h-20 px-8 py-5 border-b border-slate-200 justify-start items-center gap-2.5 inline-flex">
                  <div className="Users grow shrink basis-0 text-sky-700 text-lg font-bold font-['Tajawal'] leading-relaxed">Users</div>
                </div>
                <div className="self-stretch h-20 px-8 py-5 border-b border-slate-200 justify-start items-center gap-2.5 inline-flex">
                  <div className="grow shrink basis-0 text-sky-700 text-lg font-bold font-['Tajawal'] leading-relaxed">Onboarding session</div>
                </div>
              </div>

              {filteredPlans && filteredPlans.map((plan: Plan) => (
                <div className="Price01 grow shrink basis-0 border-r border-slate-200 flex-col justify-center items-center inline-flex">
                  <div className=" self-stretch h-44 p-7 border-b border-slate-200 flex-col justify-center items-center gap-4 flex">
                    <div className="text-sky-700 text-xl font-bold font-['Tajawal']">{plan.display_name}</div>
                    <div className="Frame28 justify-center items-end gap-2 inline-flex">
                      <div className="Free text-sky-700 text-4xl font-bold font-['Tajawal']">{plan.price}</div>
                      <div className="Frame29 py-1.5 justify-start items-end flex">
                        <div className="Month text-gray-400 text-sm font-medium font-['Tajawal'] leading-tight">/{plan.duration}</div>
                      </div>
                    </div>
                    <div className="Button self-stretch px-6 py-4 bg-sky-700 rounded justify-center items-center inline-flex">
                      <div className="ChooseThisPlan grow shrink basis-0 text-center text-slate-200 text-sm font-bold font-['Tajawal'] leading-tight">Choose This Plan</div>
                    </div>
                  </div>
                  <div className=" self-stretch h-20 py-5 border-b border-slate-200 flex-col justify-center items-center gap-1 flex">
                    <div className=" text-sky-700 text-sm font-medium font-['Tajawal'] leading-tight">20 </div>
                  </div>
                  <div className=" self-stretch h-20 py-5 border-b border-slate-200 flex-col justify-center items-center gap-1 flex">
                    <div className=" text-sky-700 text-sm font-medium font-['Tajawal'] leading-tight">4</div>
                  </div>
                </div>
              ))}
            </div>

            <div className="bg-slate-50 rounded border border-slate-200 justify-start items-start flex">
              <div className="Title grow shrink basis-0 border-r border-slate-200 flex-col justify-start items-start inline-flex">
                {features && features.map((feature: Feature) => (
                  <div key={feature.id} className="self-stretch h-20 px-8 py-5 border-b border-slate-200 justify-start items-center gap-2.5 inline-flex">
                    <div className="grow shrink basis-0 text-sky-700 text-lg font-bold font-['Tajawal'] leading-relaxed">{feature.display_name}</div>
                  </div>
                ))}
              </div>

              {filteredPlans && filteredPlans.map((plan: Plan) => (
                <div className="Price01 grow shrink basis-0 border-r border-slate-200 flex-col justify-center items-center inline-flex">
                  {features && features.map((feature: Feature) => (
                    <div key={feature.id} className="self-stretch h-20 px-8 py-5 border-b border-slate-200 justify-center items-center gap-2.5 inline-flex">
                      {plan.features.filter((f: Feature) => f.id === feature.id).length > 0 && (
                        <CheckBadgeIcon className={'h-6 text-sky-700'}></CheckBadgeIcon>)}
                    </div>
                  ))}
                </div>
              ))}
            </div>
          </div>

        </div>

      </Section>
    </LandingLayout>
  );
}

const Section = ({children, className}: PropsWithChildren & { className?: string }) => {
  return (
    <div className={`lg:min-h-screen h-full flex flex-col ${className}`}>
      <div className={'mx-auto max-w-7xl w-full min-h-full'}>
        {children}
      </div>
    </div>
  );
}
