import React, {PropsWithChildren} from "react";
import {Faq} from "../Components/Faqs/Faq";

const Page: React.FC<PropsWithChildren> = ({}: PropsWithChildren) => {
  return (
    <>
      <div className="py-20 bg-white min-h-screen h-full flex flex-col items-center justify-center">

        <div className={'max-w-xl'}>
          <Faqs Faqs={FaqsData}></Faqs>
        </div>

      </div>
    </>
  );
}

const Faqs: React.FC<PropsWithChildren & {Faqs: FaqType[]}> = ({Faqs}) => {
  return (
    <div className={'flex flex-col space-y-10'}>
      {Faqs.map((faq)=> (
        <Faq Faq={faq}></Faq>
      ))}
    </div>
  )
}

type FaqType = { number: number; question: string; answer: string };

const FaqsData: FaqType[] = [
  {
    number: 1,
    question: 'What is a digital business card?',
    answer: `Digital business cards are used by both individuals and businesses to quickly and sustainably exchange contact information. They’re more engaging, cost-effective, and eco-friendly than traditional physical business cards. Digital cards are also known as virtual, electronic, and—in some cases—NFC business cards.
How do I share my business cards?`
  },
  {
    number: 2,
    question: 'How can I make a digital business card for free?',
    answer: ``
  },
  {
    number: 3,
    question: 'How do I share my business cards?',
    answer: ``
  },
  {
    number: 4,
    question: 'What is an NFC business card?',
    answer: ``
  },
  {
    number: 5,
    question: 'What is the benefit of a digital card?',
    answer: ``
  },
]

export default Page;
