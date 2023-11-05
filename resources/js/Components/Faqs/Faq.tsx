import React, {Fragment, PropsWithChildren} from "react";
import {FaqType} from "@/types/faq";
import {Disclosure, Transition} from "@headlessui/react";

const Faq: React.FC<PropsWithChildren & {faq: FaqType}> = ({faq}) => {
  return (
    <Disclosure>
      <Disclosure.Panel static as={Fragment}>
        { ({open}) => (
          <div className="w-full">
            <Disclosure.Button as={Fragment}>
              <div className={`w-full flex items-stretch border-t-2 border-l-2 border-r-2 ${(!open ? 'border-b-2 rounded-xl' : 'rounded-t-xl')} border-indigo-500 overflow-hidden`}>
                <div className={'flex-grow px-10 py-6 flex items-center gap-10'}>
                  <span className={'flex-shrink-0'}>{faq.number}</span>
                  <p className={'flex-grow text-base font-semibold tracking-wide'}>{faq.question}</p>
                </div>

                <button className="flex-shrink-0 w-20 text-xl font-bold text-white rounded-lg overflow-hidden bg-gradient-to-tr from-sky-400 to-indigo-500">
                  <span>{open ? `-` : `+`}</span>
                </button>

              </div>
            </Disclosure.Button>
            <Transition
              show={open}
              enter="transition duration-300 ease-out"
              enterFrom="transform -translate-y-1/4 opacity-0"
              enterTo="transform translate-y-0 opacity-100"
              leave="transition duration-100 ease-out"
              leaveFrom="transform translate-y-0 opacity-100"
              leaveTo="transform -translate-y-1/4 opacity-0"
            >
              <div className={`px-16 py-8 border-b-2 border-l-2 border-r-2 ${!open ? ' rounded-xl' : 'rounded-b-xl'} border-indigo-500 overflow-hidden`}>
                <p className={'text-lg font-normal tracking-wide leading-10'}>{faq.answer}</p>
              </div>
            </Transition>
          </div>
        ) }
      </Disclosure.Panel>
    </Disclosure>
  )
}

export { Faq }
