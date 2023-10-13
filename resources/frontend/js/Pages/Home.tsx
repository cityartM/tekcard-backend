import React, {PropsWithChildren} from 'react';
import {Head, usePage} from '@inertiajs/react';
import LandingLayout from "./../Layouts/LandingLayout";
import {Faq} from "../Components/Faqs/Faq";
import useFaqs from "../Utils/Faq";
import {FaqType} from "../types/faq";

export default function Home({}: PropsWithChildren) {
  return (
    <LandingLayout>
      <Head title="Welcome" />

      <FaqsSection />

    </LandingLayout>
  );
}

const FaqsSection = () => {
  const locale = usePage().props.locale;
  const {faqs} = useFaqs(locale as string);
  return (
    <section className={'max-w-2xl mx-auto py-20'}>
      <div className={'max-w-md mx-auto flex justify-center'}>
        <h2 className={'text-center font-bold tracking-wide leading-[4.5rem] text-5xl text-sky-400'}>
          {`Frequently Ask Questions (${locale})`}
        </h2>
      </div>
      <div className={'mt-12'}>
        {faqs && <Faqs Faqs={faqs}></Faqs>}
      </div>
    </section>
  );
}

const Faqs: React.FC<PropsWithChildren & {Faqs: FaqType[]}> = ({Faqs}) => {
  return (
    <div className={'flex flex-col space-y-10'}>
      {Faqs.map((faq)=> (
        <Faq Faq={faq} key={faq.number}></Faq>
      ))}
    </div>
  )
}
