import React, {PropsWithChildren, useEffect, useState} from 'react';
import {Head, usePage} from '@inertiajs/react';
import LandingLayout from "@/Layouts/LandingLayout";
import {Faq} from "@/Components/Faqs/Faq";
import useFaqs from "@/Utils/Faq";
import {FaqType} from "@/types/faq";

import LogoBig from '@/../images/logo-big.png';

export default function AboutUs({}: PropsWithChildren) {

  return (
    <LandingLayout>
      <Head title="Welcome"/>
      <Section>
        <div className={'mt-20 text-center text-7xl font-extrabold text-[#2273AF]'}>About us</div>

        <div className={'mt-20'}>
          {/* Section Content */}
          <div className={'mx-auto max-w-5xl text-5xl font-bold text-center text-slate-700'}>
            {'We aim to help people strengthen relationships and amplify the power of their network.'}
          </div>

          <div className={'mx-auto max-w-7xl'}>
            <img src={LogoBig} alt={'about logo'} className={'w-full'} />
          </div>

          <div className="mx-auto max-w-5xl prose-xl">
            <p>
              {`Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum been the industry's standard dummy text ever since the 1500s, when an unknown printegalley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.`}
            </p>

            <h2>
              {'The Story Behind Tekcard'}
            </h2>

            <p>
              {'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum been the industry\'s standard dummy text ever since the 1500s, when an unknown printegalley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.'}
            </p>

            <ul>
              <li>
                {'Efficiently myocardinate market-driven innovation.'}
              </li>
              <li>
                {'Idea - sharing with back end products.'}
              </li>
              <li>
                {'Ballpark value added activity to beta test.'}
              </li>
            </ul>

            <blockquote className={'border-l-[1.5rem] rtl:border-r-[1.5rem] border-sky-900 p-10 text-3xl font-bold text-gray-800 leading-normal'}>
              {`"Our team was able to teach themselves primchat in a day.it's like using a shared email inboxust way more robust looking . Primchat was the modern what we were looking."`}
            </blockquote>

            <h2>
              {'Tekcard Co-founders'}
            </h2>

            <p>
              {'remaining essentially unchanged. It was popularised in the 1960s with the release of Letrsheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'}
            </p>

            <ol>
              <li>
                {'Efficiently myocardinate market-driven innovation.'}
              </li>
              <li>
                {'Idea - sharing with back end products.'}
              </li>
              <li>
                {'Ballpark value added activity to beta test.'}
              </li>
              <li>
                {'Voluptate at dolores ut dolor'}
              </li>
            </ol>
          </div>

        </div>

      </Section>

      <FaqsSection />

    </LandingLayout>
  );
}

const Section = ({children, className}: PropsWithChildren & {className?: string}) => {
  return (
    <div className={`min-h-screen h-full flex flex-col ${className}`}>
      <div className={'flex-1 py-24 mx-auto max-w-7xl w-full min-h-full'}>
        {children}
      </div>
    </div>
  );
}

const FaqsSection = () => {
    const locale = usePage().props.locale;
    const {faqs} = useFaqs(locale as string);
    return (
      <Section>
        <div className={'max-w-2xl mx-auto'}>
          <div className={'mt-16 text-center text-7xl font-extrabold text-[#2273AF]'}>{`Frequently Asked Questions`}</div>
          <div className={'mt-12'}>
            {faqs && <Faqs Faqs={faqs}></Faqs>}
          </div>
        </div>
      </Section>
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
