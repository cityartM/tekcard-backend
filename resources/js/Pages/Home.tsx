import React, {PropsWithChildren, SVGProps} from 'react';
import {Head, usePage} from '@inertiajs/react';
import LandingLayout from './../Layouts/LandingLayout';
import {Faq} from '@/Components/Faqs/Faq';
import useFaqs from '../Utils/Faq';
import {FaqType} from '@/types/faq';
import useReviews from '../Utils/Review';
import {DummySponsorIcon} from '@/Components/Icons';

import Background from '../../images/2-phones-rotated.png';
import Background1 from '../../images/home/bg-reviews.webp';

import {ReviewType} from "@/types/review";

import HeroSection from "@/Components/Home/HeroSection";
import FeaturesSection from "@/Components/Home/FeaturesSection";
import HeroStatsSection from "@/Components/Home/HeroStatsSection";
import FeaturesGridSection from "@/Components/Home/FeaturesGridSection";

export default function Home({}: PropsWithChildren) {
  const props = usePage().props
  const locale = props.locale;
  const { reviews } = useReviews(locale as string);

  return (
    <LandingLayout>
      <Head title="Welcome" />

      <HomeSection className="py-20 justify-center bg-white">
        <HeroSection />
      </HomeSection>

      <div className={'py-20 max-w-7xl mx-auto justify-center bg-gray-50'}>
        <FeaturesSection />
      </div>

      <HomeSection className={'py-20 justify-center bg-white'}>
        <HeroStatsSection />
      </HomeSection>

      <HomeSection className={'py-20 justify-center bg-gray-50'}>
        <FeaturesGridSection />
      </HomeSection>

      <HomeSection className={'py-20 justify-center bg-white'}>
        <div className={'relative px-20 py-20 grid grid-cols-1 lg:grid-cols-2 gap-10 bg-sky-50 rounded-3xl overflow-hidden'}>
          <div className="absolute inset-0 opacity-20" style={{background: `url('${Background1}')`, backgroundSize: 'cover'}}></div>
          <div className={'relative z-10 flex flex-col justify-center space-y-8'}>
            <h2 className={'uppercase text-center font-bold tracking-wide leading-[3rem] text-4xl text-sky-400'}>
              {`Create your digital business card today.`}
            </h2>
            <button type='button' className={"block px-10 py-6 text-white bg-sky-600 rounded-lg shadow"}>
              {'Get Started'}
            </button>
          </div>
          <div className={''}>
            <img className={'bg-blend-multiply'} src={Background} alt="bg-phone"/>
          </div>
        </div>
      </HomeSection>

      <HomeSection>
        <FaqsSection />
      </HomeSection>

      <div className="mt-20"></div>

    </LandingLayout>
  );
}

const HomeSection = ({children, className}: PropsWithChildren & {className?: string}) => {
  return (
    <div className={`min-h-screen h-full flex flex-col ${className}`}>
      <div className={'mx-auto max-w-7xl w-full min-h-full'}>
        {children}
      </div>
    </div>
  );
}

const TestimonialsSection = () => {
  const locale = usePage().props.locale;
  const {reviews} = useReviews(locale as string);
  return (
    <section className={'max-w-5xl mx-auto py-20 px-24 border bg-sky-100'}>
      {reviews && <Testimonials reviews={reviews}/>}
    </section>
  );
}
const Testimonials: React.FC<PropsWithChildren & {reviews: ReviewType[]}> = ({reviews}) => {
  return (
    <ul className={'flex flex-col space-y-10'}>
      {reviews.map((review)=> (
        <Review review={review} key={review.id} />
        /*<Review1 />*/
      ))}
    </ul>
  )
}

const Review: React.FC<PropsWithChildren & {review: ReviewType}> = ({review}) => {
  return (
    <div className={'px-24 py-20 bg-white rounded-lg shadow'}>
      <div className={'flex flex-col divide-y'}>
        <div className={'mb-10 flex items-center gap-10'}>

          <div className={'flex-grow flex items-stretch gap-6'}>
            <div className={'h-12 w-12 rounded-full overflow-hidden'}>
              <img src={review.image} alt="rev-o" className={'w-full h-full object-cover '} />
            </div>

            <div>
              <p>{review.name}</p>
              <p>{review.position}</p>
            </div>
          </div>

          <div className={'flex-shrink-0'}>
            <svg width="241" height="50" viewBox="0 0 241 50">
              <path d="M22.5979 6.3541C23.1966 4.51148 25.8034 4.51148 26.4021 6.3541L29.5516 16.0471C29.8193 16.8712 30.5872 17.4291 31.4537 17.4291L41.6455 17.4291C43.583 17.4291 44.3885 19.9083 42.8211 21.0471L34.5757 27.0377C33.8747 27.547 33.5814 28.4498 33.8492 29.2738L36.9986 38.9668C37.5973 40.8094 35.4884 42.3417 33.9209 41.2029L25.6756 35.2123C24.9746 34.703 24.0254 34.703 23.3244 35.2123L15.0791 41.2029C13.5116 42.3417 11.4027 40.8094 12.0014 38.9668L15.1508 29.2738C15.4186 28.4498 15.1253 27.547 14.4243 27.0377L6.17891 21.0471C4.61148 19.9083 5.41704 17.4291 7.35448 17.4291L17.5463 17.4291C18.4128 17.4291 19.1807 16.8712 19.4484 16.0471L22.5979 6.3541Z" fill="#FFB545"/>
              <path d="M120.598 6.3541C121.197 4.51148 123.803 4.51148 124.402 6.3541L127.552 16.0471C127.819 16.8712 128.587 17.4291 129.454 17.4291L139.646 17.4291C141.583 17.4291 142.389 19.9083 140.821 21.0471L132.576 27.0377C131.875 27.547 131.581 28.4498 131.849 29.2738L134.999 38.9668C135.597 40.8094 133.488 42.3417 131.921 41.2029L123.676 35.2123C122.975 34.703 122.025 34.703 121.324 35.2123L113.079 41.2029C111.512 42.3417 109.403 40.8094 110.001 38.9668L113.151 29.2738C113.419 28.4498 113.125 27.547 112.424 27.0377L104.179 21.0471C102.611 19.9083 103.417 17.4291 105.354 17.4291L115.546 17.4291C116.413 17.4291 117.181 16.8712 117.448 16.0471L120.598 6.3541Z" fill="#FFB545"/>
              <path d="M71.5979 6.3541C72.1966 4.51148 74.8034 4.51148 75.4021 6.3541L78.5516 16.0471C78.8193 16.8712 79.5872 17.4291 80.4537 17.4291L90.6455 17.4291C92.583 17.4291 93.3885 19.9083 91.8211 21.0471L83.5757 27.0377C82.8747 27.547 82.5814 28.4498 82.8492 29.2738L85.9986 38.9668C86.5973 40.8094 84.4884 42.3417 82.9209 41.2029L74.6756 35.2123C73.9746 34.703 73.0254 34.703 72.3244 35.2123L64.0791 41.2029C62.5116 42.3417 60.4027 40.8094 61.0014 38.9668L64.1508 29.2738C64.4186 28.4498 64.1253 27.547 63.4243 27.0377L55.1789 21.0471C53.6115 19.9083 54.417 17.4291 56.3545 17.4291L66.5463 17.4291C67.4128 17.4291 68.1807 16.8712 68.4484 16.0471L71.5979 6.3541Z" fill="#FFB545"/>
              <path d="M169.598 6.3541C170.197 4.51148 172.803 4.51148 173.402 6.3541L176.552 16.0471C176.819 16.8712 177.587 17.4291 178.454 17.4291L188.646 17.4291C190.583 17.4291 191.389 19.9083 189.821 21.0471L181.576 27.0377C180.875 27.547 180.581 28.4498 180.849 29.2738L183.999 38.9668C184.597 40.8094 182.488 42.3417 180.921 41.2029L172.676 35.2123C171.975 34.703 171.025 34.703 170.324 35.2123L162.079 41.2029C160.512 42.3417 158.403 40.8094 159.001 38.9668L162.151 29.2738C162.419 28.4498 162.125 27.547 161.424 27.0377L153.179 21.0471C151.611 19.9083 152.417 17.4291 154.354 17.4291L164.546 17.4291C165.413 17.4291 166.181 16.8712 166.448 16.0471L169.598 6.3541Z" fill="#FFB545"/>
              <path d="M214.598 6.3541C215.197 4.51148 217.803 4.51148 218.402 6.3541L221.552 16.0471C221.819 16.8712 222.587 17.4291 223.454 17.4291L233.646 17.4291C235.583 17.4291 236.389 19.9083 234.821 21.0471L226.576 27.0377C225.875 27.547 225.581 28.4498 225.849 29.2738L228.999 38.9668C229.597 40.8094 227.488 42.3417 225.921 41.2029L217.676 35.2123C216.975 34.703 216.025 34.703 215.324 35.2123L207.079 41.2029C205.512 42.3417 203.403 40.8094 204.001 38.9668L207.151 29.2738C207.419 28.4498 207.125 27.547 206.424 27.0377L198.179 21.0471C196.611 19.9083 197.417 17.4291 199.354 17.4291L209.546 17.4291C210.413 17.4291 211.181 16.8712 211.448 16.0471L214.598 6.3541Z" fill="#FFB545"/>
            </svg>
          </div>

        </div>

        <div>
          <p className={'mt-10'}>{review.content}</p>
        </div>
      </div>
    </div>
  );
}

import { StarIcon } from '@heroicons/react/20/solid'

export function Review1() {
  return (
    <section className="bg-white px-6 py-24 sm:py-32 lg:px-8">
      <figure className="mx-auto max-w-2xl">
        <p className="sr-only">5 out of 5 stars</p>
        <div className="flex gap-x-1 text-indigo-600">
          <StarIcon className="h-5 w-5 flex-none" aria-hidden="true" />
          <StarIcon className="h-5 w-5 flex-none" aria-hidden="true" />
          <StarIcon className="h-5 w-5 flex-none" aria-hidden="true" />
          <StarIcon className="h-5 w-5 flex-none" aria-hidden="true" />
          <StarIcon className="h-5 w-5 flex-none" aria-hidden="true" />
        </div>
        <blockquote className="mt-10 text-xl font-semibold leading-8 tracking-tight text-gray-900 sm:text-2xl sm:leading-9">
          <p>
            “Qui dolor enim consectetur do et non ex amet culpa sint in ea non dolore. Enim minim magna anim id minim eu
            cillum sunt dolore aliquip. Amet elit laborum culpa irure incididunt adipisicing culpa amet officia
            exercitation. Eu non aute velit id velit Lorem elit anim pariatur.”
          </p>
        </blockquote>
        <figcaption className="mt-10 flex items-center gap-x-6">
          <img
            className="h-12 w-12 rounded-full bg-gray-50"
            src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=1024&h=1024&q=80"
            alt=""
          />
          <div className="text-sm leading-6">
            <div className="font-semibold text-gray-900">Judith Black</div>
            <div className="mt-0.5 text-gray-600">CEO of Workcation</div>
          </div>
        </figcaption>
      </figure>
    </section>
  )
}

const CallToActionSection = () => {
  return (
    <section className={'max-w-7xl mx-auto py-20'}>
      <div className={'px-20 py-20 grid grid-cols-1 lg:grid-cols-2 gap-10 bg-sky-200 rounded-lg'}>
        <div className={'flex flex-col justify-center space-y-8'}>
          <h2 className={'uppercase text-center font-bold tracking-wide leading-[3rem] text-4xl text-sky-400'}>
            {`Create your digital business card today.`}
          </h2>
          <button type='button' className={"block px-10 py-6 text-white bg-sky-600 rounded-lg shadow"}>
            {'Get Started'}
          </button>
        </div>
        <div className={''}>
          <img src={Background} alt="bg-phone"/>
        </div>
      </div>
    </section>
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
        <Faq faq={faq} key={faq.number} />
      ))}
    </div>
  )
}

const PartnersSection = () => {
  return (
    <section className={'max-w-7xl mx-auto py-20'}>
      <div className={'max-w-md mx-auto flex justify-center'}>
        <h2 className={'text-center font-bold tracking-wide leading-[4.5rem] text-5xl text-sky-400'}>
          {`Our Partners`}
        </h2>
      </div>
      <div className={'mt-12'}>
        <div className={'px-12 py-10 bg-white flex items-center gap-10 rounded-lg '}>
          <DummySponsorIcon size={12} />
          <DummySponsorIcon size={12} />
          <DummySponsorIcon size={12} />
          <DummySponsorIcon size={12} />
          <DummySponsorIcon size={12} />
        </div>
      </div>
    </section>
  );
}

