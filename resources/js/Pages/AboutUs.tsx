import React, {PropsWithChildren} from 'react';
import {Head, usePage} from '@inertiajs/react';
import LandingLayout from "@/Layouts/LandingLayout";
import {Faq} from "@/Components/Faqs/Faq";
import useFaqs from "@/Utils/Faq";

import Sections from '@/../lang/en/pages/about.json';

export default function AboutUs({}: PropsWithChildren) {
  const locale = usePage().props.locale;
  const {faqs} = useFaqs(locale as string);
  const {hero, content} = Sections.sections;

  console.log('AboutUs page');

  return (
    <LandingLayout>
      <Head title="Welcome"/>
      <Section className="py-20 px-10 justify-center bg-gradient-to-tr to-pink-100 from-white bg-opacity-20">
        <div className="pt-20 grid grid-cols-1 gap-y-10 md:gap-y-16 lg:gap-y-20">
          <div
            className={'text-center text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold text-[#2273AF]'}>{hero.title}</div>
          <div
            className={'mx-auto max-w-5xl text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-center text-slate-700'}>
            {hero.description}
          </div>
          <div className={'mx-auto max-w-lg'}>
            <img src={hero.image} alt={'about logo'} className={'w-full h-full object-contain'}/>
          </div>
        </div>
      </Section>

      <Section className="py-16 px-10 justify-center bg-gradient-to-tr from-pink-100 to-white bg-opacity-20">
        <div className="mt-10 lg:mt-20 mx-auto max-w-5xl prose-lg lg:prose-xl"
             dangerouslySetInnerHTML={{__html: content.text}}></div>
      </Section>

      <Section className="py-16 px-6 lg:px-10 justify-center bg-gradient-to-tr to-pink-100 from-white bg-opacity-20">
        <div className="flex flex-col space-y-10 mx-auto max-w-2xl">
          <div className={'mt-16 text-center text-7xl font-extrabold text-[#2273AF]'}>{`Frequently Asked Questions`}</div>
          <div className="md:block hidden">
            {(faqs && faqs.length > 0) && (
              <div className={'flex flex-col space-y-10'}>
                {faqs.map((faq) => (
                  <Faq faq={faq} key={faq.number}></Faq>
                ))}
              </div>
            )}
          </div>
          <div className="md:hidden block">
            {(faqs && faqs.length > 0) && (
              <div className={'flex flex-col divide-y-2 divide-indigo-500'}>
                {faqs.map((faq) => (
                  <div className={'py-6 flex flex-col'} key={faq.number}>
                    <div className={`w-full flex items-stretch`}>
                      <div className="flex-grow px-10 py-6 flex items-center gap-6 rounded-xl bg-gradient-to-tr from-sky-100 to-indigo-200">
                        <span className={'flex-shrink-0'}>{faq.number}</span>
                        <p className={'flex-grow text-base font-semibold tracking-wide'}>{faq.question}</p>
                      </div>
                    </div>
                    <div className={`px-8 py-8`}>
                      <p className={'text-lg font-normal tracking-wide leading-10'}>{faq.answer}</p>
                    </div>
                  </div>
                ))}
              </div>
            )}
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
