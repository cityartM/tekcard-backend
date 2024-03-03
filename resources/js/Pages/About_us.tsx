import React, { useState, useEffect } from 'react';
import { Head, usePage } from '@inertiajs/react';
import LandingLayout from "../Layouts/LandingLayout";

export default function AboutUs() {
  const { page } = usePage().props;

  return (
    <LandingLayout>
      <Head title="About Us" />
      {page && (
        <Section>
          <div className={'mt-16 text-center text-4xl font-extrabold text-[#2273AF]'}>{page.title}</div>
          <div className="mt-8 text-center text-lg text-gray-600">{page.short_description}</div>
          <div className="mt-8 prose prose-lg max-w-3xl mx-auto" dangerouslySetInnerHTML={{ __html: page.description }} />
        </Section>
      )}
    </LandingLayout>
  );
}

const Section = ({ children, className }) => {
  return (
    <div className={`min-h-screen h-full flex flex-col ${className}`}>
      <div className={'flex-1 py-24 mx-auto max-w-7xl w-full min-h-full'}>
        {children}
      </div>
    </div>
  );
}