import React, {PropsWithChildren, useState} from "react";
import {FaqContentProps, FaqExpandButtonProps, FaqHeaderProps, FaqType} from "../../types/faq";

const Faq: React.FC<PropsWithChildren & {Faq: FaqType}> = ({Faq}) => {
  const [isOpen, setIsOpen] = useState(false);
  return (
    <div className={'w-full border-2 border-sky-400 rounded-lg overflow-hidden'}>
      <FaqHeader faq={Faq} isOpen={isOpen} setIsOpen={setIsOpen} />
      <FaqContent faq={Faq} isOpen={isOpen}/>
    </div>
  )
}

const FaqHeader: React.FC<FaqHeaderProps> = ({faq, isOpen, setIsOpen}) => {
  return (
    <div className={`w-full flex items-stretch ${isOpen?'border-b-2 border-sky-400': ''} `}>
      <div className={'flex-grow px-10 py-6 flex items-center gap-10'}>
        <span className={'flex-shrink-0'}>{faq.number}</span>
        <p className={'flex-grow text-base font-semibold tracking-wide'}>{faq.question}</p>
      </div>
      <FaqExpandButton faq={faq} isOpen={isOpen} setIsOpen={setIsOpen} />
    </div>
  )
}

const FaqContent: React.FC<FaqContentProps> = ({faq, isOpen}) => {
  return (
    <div className={`${!isOpen?'hidden': ''} px-16 py-8`}>
      <p className={'text-lg font-normal tracking-wide leading-10'}>{faq.answer}</p>
    </div>
  )
}
const FaqExpandButton: React.FC<FaqExpandButtonProps> = ({faq, isOpen, setIsOpen}) => {
  return (
    <button onClick={(e) => setIsOpen(!isOpen)} className={'flex-shrink-0 w-20 text-xl font-bold text-white bg-sky-400'}>
      {
        isOpen ? <span>{`-`}</span>
          : <span>{`+`}</span>
      }
    </button>
  )
}

export {
  Faq,
  FaqHeader,
  FaqContent,
  FaqExpandButton
}
